<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();
        Permission::truncate();
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $roleSuperAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'admin']);

        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                ],
            ],
            [
                'group_name' => 'admin profile',
                'permissions' => [
                    'admin.profile.view',
                    'admin.profile.edit',
                    'admin.profile.update',
                    'admin.profile.delete',
                ],
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.view',
                    'admin.create',
                    'admin.store',
                    'admin.edit',
                    'admin.update',
                    'admin.delete',
                ],
            ],
            [
                'group_name' => 'blog category',
                'permissions' => [
                    'blog.category.view',
                    'blog.category.create',
                    'blog.category.translate',
                    'blog.category.store',
                    'blog.category.edit',
                    'blog.category.update',
                    'blog.category.delete',
                ],
            ],
            [
                'group_name' => 'Product category',
                'permissions' => [
                    'product.category.view',
                    'product.category.create',
                    'product.category.translate',
                    'product.category.store',
                    'product.category.edit',
                    'product.category.update',
                    'product.category.delete',
                ],
            ],
            [
                'group_name' => 'Product attribute',
                'permissions' => [
                    'product.attribute.view',
                    'product.attribute.create',
                    'product.attribute.store',
                    'product.attribute.edit',
                    'product.attribute.update',
                    'product.attribute.delete',
                ],
            ],
            [
                'group_name' => 'Product brand',
                'permissions' => [
                    'product.brand.view',
                    'product.brand.create',
                    'product.brand.translate',
                    'product.brand.store',
                    'product.brand.edit',
                    'product.brand.update',
                    'product.brand.delete',
                ],
            ],
            [
                'group_name' => 'Product',
                'permissions' => [
                    'product.view',
                    'product.create',
                    'product.translate',
                    'product.store',
                    'product.edit',
                    'product.update',
                    'product.delete',
                    'product.gallery',
                    'product.gallery.update',
                    'product.related.product.view',
                    'product.related.product.update',

                ],
            ],
            [
                'group_name' => 'Product Variant',
                'permissions' => [
                    'product.variant.view',
                    'product.variant.create',
                    'product.variant.store',
                    'product.variant.edit',
                    'product.variant.update',
                    'product.variant.delete',

                ],
            ],
            [
                'group_name' => 'State',
                'permissions' => [
                    'state.view',
                    'state.create',
                    'state.store',
                    'state.edit',
                    'state.update',
                    'state.delete',
                ],
            ],
            [
                'group_name' => 'Shipping',
                'permissions' => [
                    'shipping.view',
                    'shipping.create',
                    'shipping.store',
                    'shipping.edit',
                    'shipping.update',
                    'shipping.delete',
                ],
            ],
            [
                'group_name' => 'Tax',
                'permissions' => [
                    'tax.view',
                    'tax.create',
                    'tax.store',
                    'tax.edit',
                    'tax.update',
                    'tax.delete',
                ],
            ],
            [
                'group_name' => 'City',
                'permissions' => [
                    'city.view',
                    'city.create',
                    'city.store',
                    'city.edit',
                    'city.update',
                    'city.delete',
                ],
            ],
            [
                'group_name' => 'Specialty',
                'permissions' => [
                    'specialty.view',
                    'specialty.create',
                    'specialty.translate',
                    'specialty.store',
                    'specialty.edit',
                    'specialty.update',
                    'specialty.delete',
                ],
            ],
            [
                'group_name' => 'trainer',
                'permissions' => [
                    'trainer.view',
                    'trainer.create',
                    'trainer.bulk.mail',
                    'trainer.store',
                    'trainer.edit',
                    'trainer.update',
                    'trainer.delete',
                ],
            ],
            [
                'group_name' => 'workout',
                'permissions' => [
                    'workout.view',
                    'workout.create',
                    'workout.translate',
                    'workout.store',
                    'workout.edit',
                    'workout.update',
                    'workout.delete',
                ],
            ],
            [
                'group_name' => 'activity',
                'permissions' => [
                    'activity.view',
                    'activity.create',
                    'activity.translate',
                    'activity.store',
                    'activity.edit',
                    'activity.update',
                    'activity.delete',
                ],
            ],
            [
                'group_name' => 'Class',
                'permissions' => [
                    'class.view',
                    'class.create',
                    'class.translate',
                    'class.store',
                    'class.edit',
                    'class.update',
                    'class.delete',
                ],
            ],
            [
                'group_name' => 'Gallery Group',
                'permissions' => [
                    'gallery.group.view',
                    'gallery.group.create',
                    'gallery.group.store',
                    'gallery.group.edit',
                    'gallery.group.update',
                    'gallery.group.delete',
                ],
            ],
            [
                'group_name' => 'Gallery Image',
                'permissions' => [
                    'gallery.image.view',
                    'gallery.image.create',
                    'gallery.image.store',
                    'gallery.image.edit',
                    'gallery.image.update',
                    'gallery.image.delete',
                ],
            ],
            [
                'group_name' => 'Gallery Video',
                'permissions' => [
                    'gallery.video.view',
                    'gallery.video.create',
                    'gallery.video.store',
                    'gallery.video.edit',
                    'gallery.video.update',
                    'gallery.video.delete',
                ],
            ],
            [
                'group_name' => 'Service',
                'permissions' => [
                    'service.view',
                    'service.create',
                    'service.translate',
                    'service.store',
                    'service.edit',
                    'service.update',
                    'service.delete',
                ],
            ],
            [
                'group_name' => 'Service Message',
                'permissions' => [
                    'service.message.view',
                    'service.message.delete',
                ],
            ],
            [
                'group_name' => 'Award',
                'permissions' => [
                    'award.view',
                    'award.create',
                    'award.store',
                    'award.edit',
                    'award.update',
                    'award.delete',
                ],
            ],
            [
                'group_name' => 'Partner',
                'permissions' => [
                    'partner.view',
                    'partner.create',
                    'partner.store',
                    'partner.edit',
                    'partner.update',
                    'partner.delete',
                ],
            ],
            [
                'group_name' => 'Website Manage',
                'permissions' => [
                    'website.content.view',
                    'website.content.update',
                ],
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    'blog.view',
                    'blog.create',
                    'blog.translate',
                    'blog.store',
                    'blog.edit',
                    'blog.update',
                    'blog.delete',
                ],
            ],
            [
                'group_name' => 'blog Comment',
                'permissions' => [
                    'blog.comment.view',
                    'blog.comment.reply',
                    'blog.comment.update',
                    'blog.comment.delete',
                ],
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.view',
                    'role.create',
                    'role.store',
                    'role.assign',
                    'role.edit',
                    'role.update',
                    'role.delete',
                ],
            ],
            [
                'group_name' => 'settings',
                'permissions' => [
                    'setting.view',
                    'setting.update',
                    'setting.system.view',
                    'setting.system.update',
                ],
            ],
            [
                'group_name' => 'basic payment',
                'permissions' => [
                    'basic.payment.view',
                    'basic.payment.update',
                ],
            ],
            [
                'group_name' => 'contact message',
                'permissions' => [
                    'contact.message.view',
                    'contact.message.delete',
                ],
            ],
            [
                'group_name' => 'currency',
                'permissions' => [
                    'currency.view',
                    'currency.create',
                    'currency.store',
                    'currency.edit',
                    'currency.update',
                    'currency.delete',
                ],
            ],
            [
                'group_name' => 'counter',
                'permissions' => [
                    'counter.view',
                    'counter.create',
                    'counter.store',
                    'counter.edit',
                    'counter.update',
                    'counter.delete',
                ],
            ],
            [
                'group_name' => 'media',
                'permissions' => [
                    'media.view'
                ],
            ],
            [
                'group_name' => 'customer',
                'permissions' => [
                    'customer.view',
                    'customer.bulk.mail',
                    'customer.update',
                    'customer.delete',
                ],
            ],
            [
                'group_name' => 'member',
                'permissions' => [
                    'member.list',
                    'member.view',
                    'member.create',
                    'member.bulk.mail',
                    'member.store',
                    'member.edit',
                    'member.update',
                    'member.delete',
                ],
            ],
            [
                'group_name' => 'Attendance',
                'permissions' => [
                    'attendance.list',
                    'attendance.create',
                    'attendance.store',
                    'attendance.update',
                ],
            ],
            [
                'group_name' => 'locker',
                'permissions' => [
                    'locker.list',
                    'locker.view',
                    'locker.create',
                    'locker.store',
                    'locker.edit',
                    'locker.update',
                    'locker.delete',
                    'locker.assign',
                ],
            ],
            [
                'group_name' => 'language',
                'permissions' => [
                    'language.view',
                    'language.create',
                    'language.store',
                    'language.edit',
                    'language.update',
                    'language.delete',
                    'language.translate',
                    'language.single.translate',
                ],
            ],
            [
                'group_name' => 'menu builder',
                'permissions' => [
                    'menu.view',
                    'menu.create',
                    'menu.store',
                    'menu.edit',
                    'menu.update',
                    'menu.delete',
                ],
            ],
            [
                'group_name' => 'page builder',
                'permissions' => [
                    'page.view',
                    'page.create',
                    'page.store',
                    'page.edit',
                    'page.update',
                    'page.delete',
                ],
            ],
            [
                'group_name' => 'Coupon',
                'permissions' => [
                    'coupon.view',
                    'coupon.create',
                    'coupon.store',
                    'coupon.edit',
                    'coupon.update',
                    'coupon.delete',
                    'coupon.history'
                ],
            ],
            [
                'group_name' => 'Order',
                'permissions' => [
                    'order.view',
                    'order.create',
                    'order.store',
                    'order.edit',
                    'order.update',
                    'order.delete',
                    'order.assign',
                    'order.history',
                ],
            ],
            [
                'group_name' => 'Order Payment History',
                'permissions' => [
                    'order.payment.history',
                    'order.payment.update',
                ],
            ],
            [
                'group_name' => 'subscription',
                'permissions' => [
                    'subscription.view',
                    'subscription.create',
                    'subscription.store',
                    'subscription.edit',
                    'subscription.update',
                    'subscription.delete',
                    'subscription.assign',
                ],
            ],
            [
                'group_name' => 'subscription option',
                'permissions' => [
                    'subscription.option.view',
                    'subscription.option.create',
                    'subscription.option.store',
                    'subscription.option.edit',
                    'subscription.option.update',
                    'subscription.option.delete',
                    'subscription.option.assign',
                ],
            ],
            [
                'group_name' => 'payment',
                'permissions' => [
                    'payment.view',
                    'payment.update',
                ],
            ],
            [
                'group_name' => 'newsletter',
                'permissions' => [
                    'newsletter.view',
                    'newsletter.mail',
                    'newsletter.delete',
                ],
            ],
            [
                'group_name' => 'testimonial',
                'permissions' => [
                    'testimonial.view',
                    'testimonial.create',
                    'testimonial.translate',
                    'testimonial.store',
                    'testimonial.edit',
                    'testimonial.update',
                    'testimonial.delete',
                ],
            ],
            [
                'group_name' => 'faq',
                'permissions' => [
                    'faq.view',
                    'faq.create',
                    'faq.translate',
                    'faq.store',
                    'faq.edit',
                    'faq.update',
                    'faq.delete',
                ],
            ],
            [
                'group_name' => 'Addons',
                'permissions' => [
                    'addon.view',
                    'addon.install',
                    'addon.update',
                    'addon.status.change',
                    'addon.remove',
                ],
            ]
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create([
                    'name' => $permissions[$i]['permissions'][$j],
                    'group_name' => $permissionGroup,
                    'guard_name' => 'admin',
                ]);

                $roleSuperAdmin->givePermissionTo($permission);
            }
        }
    }
}
