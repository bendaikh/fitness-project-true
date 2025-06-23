<?php

namespace App\Services;

use App\Models\User;
use App\Models\Trainer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TrainerService
{
    protected $trainer;
    protected $user;

    public function __construct(Trainer $trainer, User $user)
    {
        $this->trainer = $trainer;
        $this->user = $user;
    }

    public function all()
    {
        $query = $this->trainer;

        if (request('keyword')) {
            $query = $query->where(function ($q) {
                $q->whereHas('user', function ($q) {
                    $q->where('name', 'like', '%' . request('keyword') . '%');
                });
            });
        }


        if (request()->get('status') != '') {

            $status = request('status');

            $query = $query->where('status', "$status");
        }
        if (request()->has('order_by')) {
            $order_by = request('order_by');
            $query = $query->orderBy('id', $order_by == 1 ? 'asc' : 'desc');
        }

        return $query;
    }

    public function activeTrainers()
    {
        return $this->trainer->with(['user', 'specialty.translation'])->where('status', '1');
    }

    public function getTrainerBySlug($slug)
    {
        return $this->trainer->with('user')->where('slug', $slug)->first();
    }

    public function storeTrainer(Request $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $image = file_upload($request->file('image'), null);
        }


        // create user for member login
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone' => $request['phone'],
            'address' => $request['address'],
            'image' => $image,
            'gender' => $request['gender'],
            'user_type' => 'trainer',
            'status' => $request->status ? 'active' : 'inactive',
            'email_verified_at' => now(),
        ]);


        $slug = Str::slug($request->name);

        // check slug is exists
        $checkTrainer = $this->trainer->where('slug', $slug)->first();
        if ($checkTrainer) {
            $slug = Str::slug($request->name) . '-' . time();
        }



        $trainer = $this->trainer->create([
            'user_id' => $user->id,
            'specialty_id' => $request->specialty_id,
            'slug' => $slug,
            'description' => $request->description,
            'hours_per_week' => $request->hours_per_week,
            'profile_image' => $image,
            'facebook_link' => $request->facebook_link,
            'facebook_icon' => $request->facebook_icon,
            'twitter_link' => $request->twitter_link,
            'twitter_icon' => $request->twitter_icon,
            'instagram_link' => $request->instagram_link,
            'instagram_icon' => $request->instagram_icon,
            'status' => $request->status,
            'skills' => $request->skills,
        ]);

        return $trainer;
    }

    public function search($trainers, $keyword)
    {
        if ($keyword) {
            $trainers = $trainers->WhereHas('user', function ($query) use ($keyword) {
                $query->Where('name', 'like', '%' . $keyword . '%');
                $query->orWhere('email', 'like', '%' . $keyword . '%');
                $query->orWhere('description', 'like', '%' . $keyword . '%');
            })->orWhere(function ($query) use ($keyword) {
                $query->orWhere('hours_per_week', 'like', '%' . $keyword . '%')
                    ->orWhere('status', 'like', '%' . $keyword . '%')
                    ->orWhere('skills', 'like', '%' . $keyword . '%')
                ;
            });


            return $trainers;
        }
    }

    public function updateTrainer(Request $request, string $id)
    {


        $trainer = $this->trainer->find($id);
        $user = $this->user->find($trainer->user_id);

        $image = $user->image;
        if ($request->hasFile('image')) {
            $image = file_upload($request->file('image'), $image);
        }

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'image' => $image,
            'gender' => $request->gender,
            'status' => $request->status ? 'active' : 'inactive',
        ]);

        $trainer->update([
            'specialty_id' => $request->specialty_id,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'hours_per_week' => $request->hours_per_week,
            'profile_image' => $image,
            'facebook_link' => $request->facebook_link,
            'facebook_icon' => $request->facebook_icon,
            'twitter_link' => $request->twitter_link,
            'twitter_icon' => $request->twitter_icon,
            'instagram_link' => $request->instagram_link,
            'instagram_icon' => $request->instagram_icon,
            'status' => $request->status,
            'skills' => $request->skills,
        ]);

        return $trainer;
    }
    public function find($id)
    {
        return $this->trainer->with('user')->find($id);
    }

    public function delete(string $id)
    {
        $trainer = $this->trainer->find($id);
        $user = $this->user->find($trainer->user_id);

        file_delete($user->image);
        $trainer->delete();
        $user->delete();

        return $trainer;
    }
}
