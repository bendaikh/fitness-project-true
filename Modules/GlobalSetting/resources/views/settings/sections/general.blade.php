<div class="tab-pane fade active show" id="general_tab" role="tabpanel">
    <form action="{{ route('admin.update-general-setting') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="">{{ __('Select Theme') }}<span class="text-danger">*</span></label>
            <select name="home_theme" id="" class="form-select">
                <option value="all" @if ($setting->home_theme == 'all') selected @endif>{{ __('All Theme') }}</option>
                <option value="1" @if ($setting->home_theme == '1') selected @endif>{{ __('Theme One') }}</option>
                <option value="2" @if ($setting->home_theme == '2') selected @endif>{{ __('Theme Two') }}</option>
                <option value="3" @if ($setting->home_theme == '3') selected @endif>{{ __('Theme Three') }}
                </option>
                <option value="4" @if ($setting->home_theme == '4') selected @endif>{{ __('Theme Four') }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('Shop') }}<span class="text-danger">*</span></label>
            <select name="shop_status" id="" class="form-select">
                <option value="active" @selected(isset($setting?->shop_status) && $setting->shop_status == 'active')>
                    {{ __('Enable') }}
                </option>
                <option value="inactive" @selected(isset($setting?->shop_status) && $setting->shop_status == 'inactive')>
                    {{ __('Disable') }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('App Name') }}<span class="text-danger">*</span></label>
            <input type="text" name="app_name" class="form-control" value="{{ $setting->app_name }}">
        </div>
        <div class="form-group">
            <label for="">{{ __('Admin Mail') }}<span class="text-danger">*</span></label>
            <input type="text" name="contact_message_receiver_mail" class="form-control"
                value="{{ $setting->contact_message_receiver_mail }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Timezone') }}<span class="text-danger">*</span></label>
            <select name="timezone" id="" class="form-select select2">
                <option {{ $setting->timezone == 'Africa/Abidjan' ? 'selected' : '' }} value="Africa/Abidjan" selected>
                    {{ __('Africa/Abidjan') }}</option>
                <option {{ $setting->timezone == 'Africa/Accra' ? 'selected' : '' }} value="Africa/Accra">
                    {{ __('Africa/Accra') }}</option>
                <option {{ $setting->timezone == 'Africa/Addis_Ababa' ? 'selected' : '' }}value="Africa/Addis_Ababa">
                    {{ __('Africa/Addis_Ababa') }}</option>
                <option {{ $setting->timezone == 'Africa/Algiers' ? 'selected' : '' }} value="Africa/Algiers">
                    {{ __('Africa/Algiers') }}</option>
                <option {{ $setting->timezone == 'Africa/Asmara' ? 'selected' : '' }}value="Africa/Asmara">
                    {{ __('Africa/Asmara') }}</option>
                <option {{ $setting->timezone == 'Africa/Bamako' ? 'selected' : '' }}value="Africa/Bamako">
                    {{ __('Africa/Bamako') }}</option>
                <option {{ $setting->timezone == 'Africa/Bangui' ? 'selected' : '' }}value="Africa/Bangui">
                    {{ __('Africa/Bangui') }}</option>
                <option {{ $setting->timezone == 'Africa/Banjul' ? 'selected' : '' }} value="Africa/Banjul">
                    {{ __('Africa/Banjul') }}</option>
                <option {{ $setting->timezone == 'Africa/Bissau' ? 'selected' : '' }} value="Africa/Bissau">
                    {{ __('Africa/Bissau') }}</option>
                <option {{ $setting->timezone == 'Africa/Blantyre' ? 'selected' : '' }} value="Africa/Blantyre">
                    {{ __('Africa/Blantyre') }}</option>
                <option {{ $setting->timezone == 'Africa/Brazzaville' ? 'selected' : '' }} value="Africa/Brazzaville">
                    {{ __('Africa/Brazzaville') }}</option>
                <option {{ $setting->timezone == 'Africa/Bujumbura' ? 'selected' : '' }} value="Africa/Bujumbura">
                    {{ __('Africa/Bujumbura') }}</option>
                <option {{ $setting->timezone == 'Africa/Cairo"' ? 'selected' : '' }} value="Africa/Cairo">
                    {{ __('Africa/Cairo') }}</option>
                <option {{ $setting->timezone == 'Africa/Casablanca' ? 'selected' : '' }} value="Africa/Casablanca">
                    {{ __('Africa/Casablanca') }}</option>
                <option {{ $setting->timezone == 'Africa/Ceuta' ? 'selected' : '' }} value="Africa/Ceuta">
                    {{ __('Africa/Ceuta') }}</option>
                <option {{ $setting->timezone == 'Africa/Conakry' ? 'selected' : '' }} value="Africa/Conakry">
                    {{ __('Africa/Conakry') }}</option>
                <option {{ $setting->timezone == 'Africa/Dakar' ? 'selected' : '' }} value="Africa/Dakar">
                    {{ __('Africa/Dakar') }}</option>
                <option {{ $setting->timezone == 'Africa/Dar_es_Salaam' ? 'selected' : '' }}
                    value="Africa/Dar_es_Salaam">{{ __('Africa/Dar_es_Salaam') }}</option>
                <option {{ $setting->timezone == 'Africa/Djibouti' ? 'selected' : '' }} value="Africa/Djibouti">
                    {{ __('Africa/Djibouti') }}</option>
                <option {{ $setting->timezone == 'Africa/Douala' ? 'selected' : '' }} value="Africa/Douala">
                    {{ __('Africa/Douala') }}</option>
                <option {{ $setting->timezone == 'Africa/El_Aaiun' ? 'selected' : '' }} value="Africa/El_Aaiun">
                    {{ __('Africa/El_Aaiun') }}</option>
                <option {{ $setting->timezone == 'Africa/Freetown' ? 'selected' : '' }} value="Africa/Freetown">
                    {{ __('Africa/Freetown') }}</option>
                <option {{ $setting->timezone == 'Africa/Gaborone' ? 'selected' : '' }} value="Africa/Gaborone">
                    {{ __('Africa/Gaborone') }}</option>
                <option {{ $setting->timezone == 'Africa/Harare' ? 'selected' : '' }} value="Africa/Harare">
                    {{ __('Africa/Harare') }}</option>
                <option {{ $setting->timezone == 'Africa/Johannesburg' ? 'selected' : '' }}
                    value="Africa/Johannesburg">{{ __('Africa/Johannesburg') }}</option>
                <option {{ $setting->timezone == 'Africa/Juba' ? 'selected' : '' }} value="Africa/Juba">
                    {{ __('Africa/Juba') }}</option>
                <option {{ $setting->timezone == 'Africa/Kampala' ? 'selected' : '' }} value="Africa/Kampala">
                    {{ __('Africa/Kampala') }}</option>
                <option {{ $setting->timezone == 'Africa/Khartoum' ? 'selected' : '' }} value="Africa/Khartoum">
                    {{ __('Africa/Khartoum') }}</option>
                <option {{ $setting->timezone == 'Africa/Kigali' ? 'selected' : '' }} value="Africa/Kigali">
                    {{ __('Africa/Kigali') }}</option>
                <option {{ $setting->timezone == 'Africa/Kinshasa' ? 'selected' : '' }} value="Africa/Kinshasa">
                    {{ __('Africa/Kinshasa') }}</option>
                <option {{ $setting->timezone == 'Africa/Lagos' ? 'selected' : '' }} value="Africa/Lagos">
                    {{ __('Africa/Lagos') }}</option>
                <option {{ $setting->timezone == 'Africa/Libreville' ? 'selected' : '' }} value="Africa/Libreville">
                    {{ __('Africa/Libreville') }}</option>
                <option {{ $setting->timezone == 'Africa/Lome' ? 'selected' : '' }} value="Africa/Lome">
                    {{ __('Africa/Lome') }}</option>
                <option {{ $setting->timezone == 'Africa/Luanda' ? 'selected' : '' }} value="Africa/Luanda">
                    {{ __('Africa/Luanda') }}</option>
                <option {{ $setting->timezone == 'Africa/Lubumbashi' ? 'selected' : '' }} value="Africa/Lubumbashi">
                    {{ __('Africa/Lubumbashi') }}</option>
                <option {{ $setting->timezone == 'Africa/Lusaka' ? 'selected' : '' }} value="Africa/Lusaka">
                    {{ __('Africa/Lusaka') }}</option>
                <option {{ $setting->timezone == 'Africa/Malabo' ? 'selected' : '' }} value="Africa/Malabo">
                    {{ __('Africa/Malabo') }}</option>
                <option {{ $setting->timezone == 'Africa/Maputo' ? 'selected' : '' }} value="Africa/Maputo">
                    {{ __('Africa/Maputo') }}</option>
                <option {{ $setting->timezone == 'Africa/Maseru' ? 'selected' : '' }} value="Africa/Maseru">
                    {{ __('Africa/Maseru') }}</option>
                <option {{ $setting->timezone == 'Africa/Mbabane' ? 'selected' : '' }} value="Africa/Mbabane">
                    {{ __('Africa/Mbabane') }}</option>
                <option {{ $setting->timezone == 'Africa/Mogadishu' ? 'selected' : '' }} value="Africa/Mogadishu">
                    {{ __('Africa/Mogadishu') }}</option>
                <option {{ $setting->timezone == 'Africa/Monrovia' ? 'selected' : '' }} value="Africa/Monrovia">
                    {{ __('Africa/Monrovia') }}</option>
                <option {{ $setting->timezone == 'Africa/Nairobi' ? 'selected' : '' }} value="Africa/Nairobi">
                    {{ __('Africa/Nairobi') }}</option>
                <option {{ $setting->timezone == 'Africa/Ndjamena' ? 'selected' : '' }} value="Africa/Ndjamena">
                    {{ __('Africa/Ndjamena') }}</option>
                <option {{ $setting->timezone == 'Africa/Niamey' ? 'selected' : '' }} value="Africa/Niamey">
                    {{ __('Africa/Niamey') }}</option>
                <option {{ $setting->timezone == 'Africa/Nouakchott' ? 'selected' : '' }} value="Africa/Nouakchott">
                    {{ __('Africa/Nouakchott') }}</option>
                <option {{ $setting->timezone == 'Africa/Ouagadougou' ? 'selected' : '' }} value="Africa/Ouagadougou">
                    {{ __('Africa/Ouagadougou') }}</option>
                <option {{ $setting->timezone == 'Africa/Porto-Novo' ? 'selected' : '' }} value="Africa/Porto-Novo">
                    {{ __('Africa/Porto-Novo') }}</option>
                <option {{ $setting->timezone == 'Africa/Sao_Tome' ? 'selected' : '' }} value="Africa/Sao_Tome">
                    {{ __('Africa/Sao_Tome') }}</option>
                <option {{ $setting->timezone == 'Africa/Tripoli' ? 'selected' : '' }} value="Africa/Tripoli">
                    {{ __('Africa/Tripoli') }}</option>
                <option {{ $setting->timezone == 'Africa/Tunis' ? 'selected' : '' }} value="Africa/Tunis">
                    {{ __('Africa/Tunis') }}</option>
                <option {{ $setting->timezone == 'Africa/Windhoek' ? 'selected' : '' }} value="Africa/Windhoek">
                    {{ __('Africa/Windhoek') }}</option>
                <option {{ $setting->timezone == 'America/Adak' ? 'selected' : '' }} value="America/Adak">
                    {{ __('America/Adak') }}</option>
                <option {{ $setting->timezone == 'America/Anchorage' ? 'selected' : '' }} value="America/Anchorage">
                    {{ __('America/Anchorage') }}</option>
                <option {{ $setting->timezone == 'America/Anguilla' ? 'selected' : '' }} value="America/Anguilla">
                    {{ __('America/Anguilla') }}</option>
                <option {{ $setting->timezone == 'America/Antigua' ? 'selected' : '' }} value="America/Antigua">
                    {{ __('America/Antigua') }}</option>
                <option {{ $setting->timezone == 'America/Araguaina' ? 'selected' : '' }} value="America/Araguaina">
                    {{ __('America/Araguaina') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Buenos_Aires' ? 'selected' : '' }}
                    value="America/Argentina/Buenos_Aires">{{ __('America/Argentina/Buenos_Aires') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Catamarca' ? 'selected' : '' }}
                    value="America/Argentina/Catamarca">{{ __('America/Argentina/Catamarca') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Cordoba' ? 'selected' : '' }}
                    value="America/Argentina/Cordoba">{{ __('America/Argentina/Cordoba') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Jujuy' ? 'selected' : '' }}
                    value="America/Argentina/Jujuy">{{ __('America/Argentina/Jujuy') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/La_Rioja' ? 'selected' : '' }}
                    value="America/Argentina/La_Rioja">{{ __('America/Argentina/La_Rioja') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Mendoza' ? 'selected' : '' }}
                    value="America/Argentina/Mendoza">{{ __('America/Argentina/Mendoza') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Rio_Gallegos' ? 'selected' : '' }}
                    value="America/Argentina/Rio_Gallegos">{{ __('America/Argentina/Rio_Gallegos') }}</option>

                <option {{ $setting->timezone == 'America/Argentina/Salta' ? 'selected' : '' }}
                    value="America/Argentina/Salta">{{ __('America/Argentina/Salta') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/San_Juan' ? 'selected' : '' }}
                    value="America/Argentina/San_Juan">{{ __('America/Argentina/San_Juan') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/San_Luis' ? 'selected' : '' }}
                    value="America/Argentina/San_Luis">{{ __('America/Argentina/San_Luis') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Tucuman' ? 'selected' : '' }}
                    value="America/Argentina/Tucuman">{{ __('America/Argentina/Tucuman') }}</option>
                <option {{ $setting->timezone == 'America/Argentina/Ushuaia' ? 'selected' : '' }}
                    value="America/Argentina/Ushuaia">{{ __('America/Argentina/Ushuaia') }}</option>
                <option {{ $setting->timezone == 'America/Aruba' ? 'selected' : '' }} value="America/Aruba">
                    {{ __('America/Aruba') }}</option>
                <option {{ $setting->timezone == 'America/Asuncion' ? 'selected' : '' }} value="America/Asuncion">
                    {{ __('America/Asuncion') }}</option>
                <option {{ $setting->timezone == 'America/Atikokan' ? 'selected' : '' }} value="America/Atikokan">
                    {{ __('America/Atikokan') }}</option>
                <option {{ $setting->timezone == 'America/Bahia' ? 'selected' : '' }} value="America/Bahia">
                    {{ __('America/Bahia') }}</option>
                <option {{ $setting->timezone == 'America/Bahia_Banderas' ? 'selected' : '' }}
                    value="America/Bahia_Banderas">{{ __('America/Bahia_Banderas') }}</option>
                <option {{ $setting->timezone == 'America/Barbados' ? 'selected' : '' }} value="America/Barbados">
                    {{ __('America/Barbados') }}</option>
                <option {{ $setting->timezone == 'America/Belem' ? 'selected' : '' }} value="America/Belem">
                    {{ __('America/Belem') }}</option>
                <option {{ $setting->timezone == 'America/Belize' ? 'selected' : '' }} value="America/Belize">
                    {{ __('America/Belize') }}</option>
                <option {{ $setting->timezone == 'America/Blanc-Sablon' ? 'selected' : '' }}
                    value="America/Blanc-Sablon">{{ __('America/Blanc-Sablon') }}</option>
                <option {{ $setting->timezone == 'America/Boa_Vista' ? 'selected' : '' }} value="America/Boa_Vista">
                    {{ __('America/Boa_Vista') }}</option>
                <option {{ $setting->timezone == 'America/Bogota' ? 'selected' : '' }} value="America/Bogota">
                    {{ __('America/Bogota') }}</option>
                <option {{ $setting->timezone == 'America/Boise' ? 'selected' : '' }} value="America/Boise">
                    {{ __('America/Boise') }}</option>
                <option {{ $setting->timezone == 'America/Cambridge_Bay' ? 'selected' : '' }}
                    value="America/Cambridge_Bay">{{ __('America/Cambridge_Bay') }}</option>
                <option {{ $setting->timezone == 'America/Campo_Grande' ? 'selected' : '' }}
                    value="America/Campo_Grande">{{ __('America/Campo_Grande') }}</option>
                <option {{ $setting->timezone == 'America/Cancun' ? 'selected' : '' }} value="America/Cancun">
                    {{ __('America/Cancun') }}</option>
                <option {{ $setting->timezone == 'America/Caracas' ? 'selected' : '' }} value="America/Caracas">
                    {{ __('America/Caracas') }}</option>
                <option {{ $setting->timezone == 'America/Cayenne' ? 'selected' : '' }} value="America/Cayenne">
                    {{ __('America/Cayenne') }}</option>
                <option {{ $setting->timezone == 'America/Cayman' ? 'selected' : '' }} value="America/Cayman">
                    {{ __('America/Cayman') }}</option>
                <option {{ $setting->timezone == 'America/Chicago' ? 'selected' : '' }} value="America/Chicago">
                    {{ __('America/Chicago') }}</option>
                <option {{ $setting->timezone == 'America/Chihuahua' ? 'selected' : '' }} value="America/Chihuahua">
                    {{ __('America/Chihuahua') }}</option>
                <option {{ $setting->timezone == 'America/Costa_Rica' ? 'selected' : '' }}
                    value="America/Costa_Rica">{{ __('America/Costa_Rica') }}</option>
                <option {{ $setting->timezone == 'America/Creston' ? 'selected' : '' }} value="America/Creston">
                    {{ __('America/Creston') }}</option>
                <option {{ $setting->timezone == 'America/Cuiaba' ? 'selected' : '' }} value="America/Cuiaba">
                    {{ __('America/Cuiaba') }}</option>
                <option {{ $setting->timezone == 'America/Curacao' ? 'selected' : '' }} value="America/Curacao">
                    {{ __('America/Curacao') }}</option>
                <option {{ $setting->timezone == 'America/Danmarkshavn' ? 'selected' : '' }}
                    value="America/Danmarkshavn">{{ __('America/Danmarkshavn') }}</option>
                <option {{ $setting->timezone == 'America/Dawson' ? 'selected' : '' }} value="America/Dawson">
                    {{ __('America/Dawson') }}</option>
                <option {{ $setting->timezone == 'America/Dawson_Creek' ? 'selected' : '' }}
                    value="America/Dawson_Creek">{{ __('America/Dawson_Creek') }}</option>
                <option {{ $setting->timezone == 'America/Denver' ? 'selected' : '' }} value="America/Denver">
                    {{ __('America/Denver') }}</option>
                <option {{ $setting->timezone == 'America/Detroit' ? 'selected' : '' }} value="America/Detroit">
                    {{ __('America/Detroit') }}</option>
                <option {{ $setting->timezone == 'America/Dominica' ? 'selected' : '' }} value="America/Dominica">
                    {{ __('America/Dominica') }}</option>
                <option {{ $setting->timezone == 'America/Edmonton' ? 'selected' : '' }} value="America/Edmonton">
                    {{ __('America/Edmonton') }}</option>
                <option {{ $setting->timezone == 'America/Eirunepe' ? 'selected' : '' }} value="America/Eirunepe">
                    {{ __('America/Eirunepe') }}</option>
                <option {{ $setting->timezone == 'America/El_Salvador' ? 'selected' : '' }}
                    value="America/El_Salvador">{{ __('America/El_Salvador') }}</option>
                <option {{ $setting->timezone == 'America/Fort_Nelson' ? 'selected' : '' }}
                    value="America/Fort_Nelson">{{ __('America/Fort_Nelson') }}</option>
                <option {{ $setting->timezone == 'America/Fortaleza' ? 'selected' : '' }} value="America/Fortaleza">
                    {{ __('America/Fortaleza') }}</option>
                <option {{ $setting->timezone == 'America/Glace_Bay' ? 'selected' : '' }} value="America/Glace_Bay">
                    {{ __('America/Glace_Bay') }}</option>
                <option {{ $setting->timezone == 'America/Goose_Bay' ? 'selected' : '' }} value="America/Goose_Bay">
                    {{ __('America/Goose_Bay') }}</option>

                <option {{ $setting->timezone == 'America/Grand_Turk' ? 'selected' : '' }}
                    value="America/Grand_Turk">{{ __('America/Grand_Turk') }}</option>
                <option {{ $setting->timezone == 'America/Grenada' ? 'selected' : '' }} value="America/Grenada">
                    {{ __('America/Grenada') }}</option>
                <option {{ $setting->timezone == 'America/Guadeloupe' ? 'selected' : '' }}
                    value="America/Guadeloupe">{{ __('America/Guadeloupe') }}</option>
                <option {{ $setting->timezone == 'America/Guatemala' ? 'selected' : '' }} value="America/Guatemala">
                    {{ __('America/Guatemala') }}</option>
                <option {{ $setting->timezone == 'America/Guayaquil' ? 'selected' : '' }} value="America/Guayaquil">
                    {{ __('America/Guayaquil') }}</option>
                <option {{ $setting->timezone == 'America/Guyana' ? 'selected' : '' }} value="America/Guyana">
                    {{ __('America/Guyana') }}</option>
                <option {{ $setting->timezone == 'America/Halifax' ? 'selected' : '' }} value="America/Halifax">
                    {{ __('America/Halifax') }}</option>
                <option {{ $setting->timezone == 'America/Havana' ? 'selected' : '' }} value="America/Havana">
                    {{ __('America/Havana') }}</option>
                <option {{ $setting->timezone == 'America/Hermosillo' ? 'selected' : '' }}
                    value="America/Hermosillo">{{ __('America/Hermosillo') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Indianapolis' ? 'selected' : '' }}
                    value="America/Indiana/Indianapolis">{{ __('America/Indiana/Indianapolis') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Knox' ? 'selected' : '' }}
                    value="America/Indiana/Knox">{{ __('America/Indiana/Knox') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Marengo' ? 'selected' : '' }}
                    value="America/Indiana/Marengo">{{ __('America/Indiana/Marengo') }}</option>

                <option {{ $setting->timezone == 'America/Indiana/Petersburg' ? 'selected' : '' }}
                    value="America/Indiana/Petersburg">{{ __('America/Indiana/Petersburg') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Tell_City' ? 'selected' : '' }}
                    value="America/Indiana/Tell_City">{{ __('America/Indiana/Tell_City') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Vevay' ? 'selected' : '' }}
                    value="America/Indiana/Vevay">{{ __('America/Indiana/Vevay') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Vincennes' ? 'selected' : '' }}
                    value="America/Indiana/Vincennes">{{ __('America/Indiana/Vincennes') }}</option>
                <option {{ $setting->timezone == 'America/Indiana/Winamac' ? 'selected' : '' }}
                    value="America/Indiana/Winamac">{{ __('America/Indiana/Winamac') }}</option>
                <option {{ $setting->timezone == 'America/Inuvik' ? 'selected' : '' }} value="America/Inuvik">
                    {{ __('America/Inuvik') }}</option>
                <option {{ $setting->timezone == 'America/Iqaluit' ? 'selected' : '' }} value="America/Iqaluit">
                    {{ __('America/Iqaluit') }}</option>
                <option {{ $setting->timezone == 'America/Jamaica' ? 'selected' : '' }} value="America/Jamaica">
                    {{ __('America/Jamaica') }}</option>
                <option {{ $setting->timezone == 'America/Juneau' ? 'selected' : '' }} value="America/Juneau">
                    {{ __('America/Juneau') }}</option>
                <option {{ $setting->timezone == 'America/Kentucky/Louisville' ? 'selected' : '' }}
                    value="America/Kentucky/Louisville">{{ __('America/Kentucky/Louisville') }}</option>
                <option {{ $setting->timezone == 'America/Kentucky/Monticello' ? 'selected' : '' }}
                    value="America/Kentucky/Monticello">{{ __('America/Kentucky/Monticello') }}</option>
                <option {{ $setting->timezone == 'America/Kralendijk' ? 'selected' : '' }}
                    value="America/Kralendijk">{{ __('America/Kralendijk') }}</option>
                <option {{ $setting->timezone == 'America/La_Paz' ? 'selected' : '' }} value="America/La_Paz">
                    {{ __('America/La_Paz') }}</option>
                <option {{ $setting->timezone == 'America/Lima' ? 'selected' : '' }} value="America/Lima">
                    {{ __('America/Lima') }}</option>
                <option {{ $setting->timezone == 'America/Los_Angeles' ? 'selected' : '' }}
                    value="America/Los_Angeles">{{ __('America/Los_Angeles') }}</option>
                <option {{ $setting->timezone == 'America/Lower_Princes' ? 'selected' : '' }}
                    value="America/Lower_Princes">{{ __('America/Lower_Princes') }}</option>
                <option {{ $setting->timezone == 'America/Maceio' ? 'selected' : '' }} value="America/Maceio">
                    {{ __('America/Maceio') }}</option>
                <option {{ $setting->timezone == 'America/Managua' ? 'selected' : '' }} value="America/Managua">
                    {{ __('America/Managua') }}</option>
                <option {{ $setting->timezone == 'America/Manaus' ? 'selected' : '' }} value="America/Manaus">
                    {{ __('America/Manaus') }}</option>
                <option {{ $setting->timezone == 'America/Marigot' ? 'selected' : '' }} value="America/Marigot">
                    {{ __('America/Marigot') }}</option>
                <option {{ $setting->timezone == 'America/Martinique' ? 'selected' : '' }}
                    value="America/Martinique">{{ __('America/Martinique') }}</option>
                <option {{ $setting->timezone == 'America/Matamoros' ? 'selected' : '' }} value="America/Matamoros">
                    {{ __('America/Matamoros') }}</option>
                <option {{ $setting->timezone == 'America/Mazatlan' ? 'selected' : '' }} value="America/Mazatlan">
                    {{ __('America/Mazatlan') }}</option>
                <option {{ $setting->timezone == 'America/Menominee' ? 'selected' : '' }} value="America/Menominee">
                    {{ __('America/Menominee') }}</option>
                <option {{ $setting->timezone == 'America/Merida' ? 'selected' : '' }} value="America/Merida">
                    {{ __('America/Merida') }}</option>
                <option {{ $setting->timezone == 'America/Metlakatla' ? 'selected' : '' }}
                    value="America/Metlakatla">{{ __('America/Metlakatla') }}</option>
                <option {{ $setting->timezone == 'America/Mexico_City' ? 'selected' : '' }}
                    value="America/Mexico_City">{{ __('America/Mexico_City') }}</option>
                <option {{ $setting->timezone == 'America/Miquelon' ? 'selected' : '' }} value="America/Miquelon">
                    {{ __('America/Miquelon') }}</option>
                <option {{ $setting->timezone == 'America/Moncton' ? 'selected' : '' }} value="America/Moncton">
                    {{ __('America/Moncton') }}</option>
                <option {{ $setting->timezone == 'America/Monterrey' ? 'selected' : '' }} value="America/Monterrey">
                    {{ __('America/Monterrey') }}</option>
                <option {{ $setting->timezone == 'America/Montevideo' ? 'selected' : '' }}
                    value="America/Montevideo">{{ __('America/Montevideo') }}</option>
                <option {{ $setting->timezone == 'America/Montserrat' ? 'selected' : '' }}
                    value="America/Montserrat">{{ __('America/Montserrat') }}</option>
                <option {{ $setting->timezone == 'America/Nassau' ? 'selected' : '' }} value="America/Nassau">
                    {{ __('America/Nassau') }}</option>
                <option {{ $setting->timezone == 'America/New_York' ? 'selected' : '' }} value="America/New_York">
                    {{ __('America/New_York') }}</option>
                <option {{ $setting->timezone == 'America/Nipigon' ? 'selected' : '' }} value="America/Nipigon">
                    {{ __('America/Nipigon') }}</option>
                <option {{ $setting->timezone == 'America/Nome' ? 'selected' : '' }} value="America/Nome">
                    {{ __('America/Nome') }}</option>
                <option {{ $setting->timezone == 'America/Noronha' ? 'selected' : '' }} value="America/Noronha">
                    {{ __('America/Noronha') }}</option>
                <option {{ $setting->timezone == 'America/North_Dakota/Beulah' ? 'selected' : '' }}
                    value="America/North_Dakota/Beulah">{{ __('America/North_Dakota/Beulah') }}</option>
                <option {{ $setting->timezone == 'America/North_Dakota/Center' ? 'selected' : '' }}
                    value="America/North_Dakota/Center">{{ __('America/North_Dakota/Center') }}</option>
                <option {{ $setting->timezone == 'America/North_Dakota/New_Salem' ? 'selected' : '' }}
                    value="America/North_Dakota/New_Salem">{{ __('America/North_Dakota/New_Salem') }}</option>
                <option {{ $setting->timezone == 'America/Nuuk' ? 'selected' : '' }} value="America/Nuuk">
                    {{ __('America/Nuuk') }}</option>
                <option {{ $setting->timezone == 'America/Ojinaga' ? 'selected' : '' }} value="America/Ojinaga">
                    {{ __('America/Ojinaga') }}</option>
                <option {{ $setting->timezone == 'America/Panama' ? 'selected' : '' }} value="America/Panama">
                    {{ __('America/Panama') }}</option>
                <option {{ $setting->timezone == 'America/Pangnirtung' ? 'selected' : '' }}
                    value="America/Pangnirtung">{{ __('America/Pangnirtung') }}</option>
                <option {{ $setting->timezone == 'America/Paramaribo' ? 'selected' : '' }}
                    value="America/Paramaribo">{{ __('America/Paramaribo') }}</option>


                <option {{ $setting->timezone == 'America/Phoenix' ? 'selected' : '' }} value="America/Phoenix">
                    {{ __('America/Phoenix') }}</option>
                <option {{ $setting->timezone == 'America/Port-au-Prince' ? 'selected' : '' }}
                    value="America/Port-au-Prince">{{ __('America/Port-au-Prince') }}</option>
                <option {{ $setting->timezone == 'America/Port_of_Spain' ? 'selected' : '' }}
                    value="America/Port_of_Spain">{{ __('America/Port_of_Spain') }}</option>
                <option {{ $setting->timezone == 'America/Porto_Velho' ? 'selected' : '' }}
                    value="America/Porto_Velho">{{ __('America/Porto_Velho') }}</option>
                <option {{ $setting->timezone == 'America/Puerto_Rico' ? 'selected' : '' }}
                    value="America/Puerto_Rico">{{ __('America/Puerto_Rico') }}</option>
                <option {{ $setting->timezone == 'America/Punta_Arenas' ? 'selected' : '' }}
                    value="America/Punta_Arenas">{{ __('America/Punta_Arenas') }}</option>
                <option {{ $setting->timezone == 'America/Rainy_River' ? 'selected' : '' }}
                    value="America/Rainy_River">{{ __('America/Rainy_River') }}</option>
                <option {{ $setting->timezone == 'America/Rankin_Inlet' ? 'selected' : '' }}
                    value="America/Rankin_Inlet">{{ __('America/Rankin_Inlet') }}</option>
                <option {{ $setting->timezone == 'America/Recife' ? 'selected' : '' }} value="America/Recife">
                    {{ __('America/Recife') }}</option>
                <option {{ $setting->timezone == 'America/Regina' ? 'selected' : '' }} value="America/Regina">
                    {{ __('America/Regina') }}</option>
                <option {{ $setting->timezone == 'America/Resolute' ? 'selected' : '' }} value="America/Resolute">
                    {{ __('America/Resolute') }}</option>
                <option {{ $setting->timezone == 'America/Rio_Branco' ? 'selected' : '' }}
                    value="America/Rio_Branco">{{ __('America/Rio_Branco') }}</option>
                <option {{ $setting->timezone == 'America/Santarem' ? 'selected' : '' }} value="America/Santarem">
                    {{ __('America/Santarem') }}</option>
                <option {{ $setting->timezone == 'America/Santiago' ? 'selected' : '' }} value="America/Santiago">
                    {{ __('America/Santiago') }}</option>
                <option {{ $setting->timezone == 'America/Santo_Domingo' ? 'selected' : '' }}
                    value="America/Santo_Domingo">{{ __('America/Santo_Domingo') }}</option>
                <option {{ $setting->timezone == 'America/Sao_Paulo' ? 'selected' : '' }} value="America/Sao_Paulo">
                    {{ __('America/Sao_Paulo') }}</option>
                <option {{ $setting->timezone == 'America/Scoresbysund' ? 'selected' : '' }}
                    value="America/Scoresbysund">{{ __('America/Scoresbysund') }}</option>
                <option {{ $setting->timezone == 'America/Sitka' ? 'selected' : '' }} value="America/Sitka">
                    {{ __('America/Sitka') }}</option>
                <option {{ $setting->timezone == 'America/St_Barthelemy' ? 'selected' : '' }}
                    value="America/St_Barthelemy">{{ __('America/St_Barthelemy') }}</option>
                <option {{ $setting->timezone == 'America/St_Johns' ? 'selected' : '' }} value="America/St_Johns">
                    {{ __('America/St_Johns') }}</option>
                <option {{ $setting->timezone == 'America/St_Kitts' ? 'selected' : '' }} value="America/St_Kitts">
                    {{ __('America/St_Kitts') }}</option>
                <option {{ $setting->timezone == 'America/St_Lucia' ? 'selected' : '' }} value="America/St_Lucia">
                    {{ __('America/St_Lucia') }}</option>
                <option {{ $setting->timezone == 'America/St_Thomas' ? 'selected' : '' }} value="America/St_Thomas">
                    {{ __('America/St_Thomas') }}</option>
                <option {{ $setting->timezone == 'America/St_Vincent' ? 'selected' : '' }}
                    value="America/St_Vincent">{{ __('America/St_Vincent') }}</option>
                <option {{ $setting->timezone == 'America/Swift_Current' ? 'selected' : '' }}
                    value="America/Swift_Current">{{ __('America/Swift_Current') }}</option>
                <option {{ $setting->timezone == 'America/Tegucigalpa' ? 'selected' : '' }}
                    value="America/Tegucigalpa">{{ __('America/Tegucigalpa') }}</option>
                <option {{ $setting->timezone == 'America/Thule' ? 'selected' : '' }} value="America/Thule">
                    {{ __('America/Thule') }}</option>
                <option {{ $setting->timezone == 'America/Thunder_Bay' ? 'selected' : '' }}
                    value="America/Thunder_Bay">{{ __('America/Thunder_Bay') }}</option>
                <option {{ $setting->timezone == 'America/Tijuana' ? 'selected' : '' }} value="America/Tijuana">
                    {{ __('America/Tijuana') }}</option>
                <option {{ $setting->timezone == 'America/Toronto' ? 'selected' : '' }} value="America/Toronto">
                    {{ __('America/Toronto') }}</option>
                <option {{ $setting->timezone == 'America/Tortola' ? 'selected' : '' }} value="America/Tortola">
                    {{ __('America/Tortola') }}</option>
                <option {{ $setting->timezone == 'America/Vancouver' ? 'selected' : '' }} value="America/Vancouver">
                    {{ __('America/Vancouver') }}</option>
                <option {{ $setting->timezone == 'America/Whitehorse' ? 'selected' : '' }}
                    value="America/Whitehorse">{{ __('America/Whitehorse') }}</option>
                <option {{ $setting->timezone == 'America/Winnipeg' ? 'selected' : '' }} value="America/Winnipeg">
                    {{ __('America/Winnipeg') }}</option>
                <option {{ $setting->timezone == 'America/Yakutat' ? 'selected' : '' }} value="America/Yakutat">
                    {{ __('America/Yakutat') }}</option>
                <option {{ $setting->timezone == 'America/Yellowknife' ? 'selected' : '' }}
                    value="America/Yellowknife">{{ __('America/Yellowknife') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Casey' ? 'selected' : '' }} value="Antarctica/Casey">
                    {{ __('Antarctica/Casey') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Davis' ? 'selected' : '' }} value="Antarctica/Davis">
                    {{ __('Antarctica/Davis') }}</option>
                <option {{ $setting->timezone == 'Antarctica/DumontDUrville' ? 'selected' : '' }}
                    value="Antarctica/DumontDUrville">{{ __('Antarctica/DumontDUrville') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Macquarie' ? 'selected' : '' }}
                    value="Antarctica/Macquarie">{{ __('Antarctica/Macquarie') }}</option>


                <option {{ $setting->timezone == 'Antarctica/Mawson' ? 'selected' : '' }} value="Antarctica/Mawson">
                    {{ __('Antarctica/Mawson') }}</option>
                <option {{ $setting->timezone == 'Antarctica/McMurdo' ? 'selected' : '' }}
                    value="Antarctica/McMurdo">{{ __('Antarctica/McMurdo') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Palmer' ? 'selected' : '' }} value="Antarctica/Palmer">
                    {{ __('Antarctica/Palmer') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Rothera' ? 'selected' : '' }}
                    value="Antarctica/Rothera">{{ __('Antarctica/Rothera') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Syowa' ? 'selected' : '' }} value="Antarctica/Syowa">
                    {{ __('Antarctica/Syowa') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Troll' ? 'selected' : '' }} value="Antarctica/Troll">
                    {{ __('Antarctica/Troll') }}</option>
                <option {{ $setting->timezone == 'Antarctica/Vostok' ? 'selected' : '' }} value="Antarctica/Vostok">
                    {{ __('Antarctica/Vostok') }}</option>
                <option {{ $setting->timezone == 'Arctic/Longyearbyen' ? 'selected' : '' }}
                    value="Arctic/Longyearbyen">{{ __('Arctic/Longyearbyen') }}</option>
                <option {{ $setting->timezone == 'Asia/Aden' ? 'selected' : '' }} value="Asia/Aden">
                    {{ __('Asia/Aden') }}</option>
                <option {{ $setting->timezone == 'Asia/Almaty' ? 'selected' : '' }} value="Asia/Almaty">
                    {{ __('Asia/Almaty') }}</option>
                <option {{ $setting->timezone == 'Asia/Amman' ? 'selected' : '' }} value="Asia/Amman">
                    {{ __('Asia/Amman') }}</option>
                <option {{ $setting->timezone == 'Asia/Anadyr' ? 'selected' : '' }} value="Asia/Anadyr">
                    {{ __('Asia/Anadyr') }}</option>
                <option {{ $setting->timezone == 'Asia/Aqtau' ? 'selected' : '' }} value="Asia/Aqtau">
                    {{ __('Asia/Aqtau') }}</option>
                <option {{ $setting->timezone == 'Asia/Aqtobe' ? 'selected' : '' }} value="Asia/Aqtobe">
                    {{ __('Asia/Aqtobe') }}</option>
                <option {{ $setting->timezone == 'Asia/Ashgabat' ? 'selected' : '' }} value="Asia/Ashgabat">
                    {{ __('Asia/Ashgabat') }}</option>
                <option {{ $setting->timezone == 'Asia/Atyrau' ? 'selected' : '' }} value="Asia/Atyrau">
                    {{ __('Asia/Atyrau') }}</option>
                <option {{ $setting->timezone == 'Asia/Baghdad' ? 'selected' : '' }} value="Asia/Baghdad">
                    {{ __('Asia/Baghdad') }}</option>
                <option {{ $setting->timezone == 'Asia/Bahrain' ? 'selected' : '' }} value="Asia/Bahrain">
                    {{ __('Asia/Bahrain') }}</option>
                <option {{ $setting->timezone == 'Asia/Baku' ? 'selected' : '' }} value="Asia/Baku">
                    {{ __('Asia/Baku') }}</option>
                <option {{ $setting->timezone == 'Asia/Bangkok' ? 'selected' : '' }} value="Asia/Bangkok">
                    {{ __('Asia/Bangkok') }}</option>
                <option {{ $setting->timezone == 'Asia/Barnaul' ? 'selected' : '' }} value="Asia/Barnaul">
                    {{ __('Asia/Barnaul') }}</option>
                <option {{ $setting->timezone == 'Asia/Beirut' ? 'selected' : '' }} value="Asia/Beirut">
                    {{ __('Asia/Beirut') }}</option>
                <option {{ $setting->timezone == 'Asia/Bishkek' ? 'selected' : '' }} value="Asia/Bishkek">
                    {{ __('Asia/Bishkek') }}</option>
                <option {{ $setting->timezone == 'Asia/Brunei' ? 'selected' : '' }} value="Asia/Brunei">
                    {{ __('Asia/Brunei') }}</option>
                <option {{ $setting->timezone == 'Asia/Chita' ? 'selected' : '' }} value="Asia/Chita">
                    {{ __('Asia/Chita') }}</option>
                <option {{ $setting->timezone == 'Asia/Choibalsan' ? 'selected' : '' }} value="Asia/Choibalsan">
                    {{ __('Asia/Choibalsan') }}</option>
                <option {{ $setting->timezone == 'Asia/Colombo' ? 'selected' : '' }} value="Asia/Colombo">
                    {{ __('Asia/Colombo') }}</option>
                <option {{ $setting->timezone == 'Asia/Damascus' ? 'selected' : '' }} value="Asia/Damascus">
                    {{ __('Asia/Damascus') }}</option>
                <option {{ $setting->timezone == 'Asia/Dhaka' ? 'selected' : '' }} value="Asia/Dhaka">
                    {{ __('Asia/Dhaka') }}</option>
                <option {{ $setting->timezone == 'Asia/Dili' ? 'selected' : '' }} value="Asia/Dili">
                    {{ __('Asia/Dili') }}</option>
                <option {{ $setting->timezone == 'Asia/Dubai' ? 'selected' : '' }} value="Asia/Dubai">
                    {{ __('Asia/Dubai') }}</option>
                <option {{ $setting->timezone == 'Asia/Dushanbe' ? 'selected' : '' }} value="Asia/Dushanbe">
                    {{ __('Asia/Dushanbe') }}</option>
                <option {{ $setting->timezone == 'Asia/Famagusta' ? 'selected' : '' }} value="Asia/Famagusta">
                    {{ __('Asia/Famagusta') }}</option>
                <option {{ $setting->timezone == 'Asia/Gaza' ? 'selected' : '' }} value="Asia/Gaza">
                    {{ __('Asia/Gaza') }}</option>
                <option {{ $setting->timezone == 'Asia/Hebron' ? 'selected' : '' }} value="Asia/Hebron">
                    {{ __('Asia/Hebron') }}</option>
                <option {{ $setting->timezone == 'Asia/Ho_Chi_Minh' ? 'selected' : '' }} value="Asia/Ho_Chi_Minh">
                    {{ __('Asia/Ho_Chi_Minh') }}</option>
                <option {{ $setting->timezone == 'Asia/Hong_Kong' ? 'selected' : '' }} value="Asia/Hong_Kong">
                    {{ __('Asia/Hong_Kong') }}</option>
                <option {{ $setting->timezone == 'Asia/Hovd' ? 'selected' : '' }} value="Asia/Hovd">
                    {{ __('Asia/Hovd') }}</option>
                <option {{ $setting->timezone == 'Asia/Irkutsk' ? 'selected' : '' }} value="Asia/Irkutsk">
                    {{ __('Asia/Irkutsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Jakarta' ? 'selected' : '' }} value="Asia/Jakarta">
                    {{ __('Asia/Jakarta') }}</option>
                <option {{ $setting->timezone == 'Asia/Jayapura' ? 'selected' : '' }} value="Asia/Jayapura">
                    {{ __('Asia/Jayapura') }}</option>
                <option {{ $setting->timezone == 'Asia/Jerusalem' ? 'selected' : '' }} value="Asia/Jerusalem">
                    {{ __('Asia/Jerusalem') }}</option>
                <option {{ $setting->timezone == 'Asia/Kabul' ? 'selected' : '' }} value="Asia/Kabul">
                    {{ __('Asia/Kabul') }}</option>
                <option {{ $setting->timezone == 'Asia/Kamchatka' ? 'selected' : '' }} value="Asia/Kamchatka">
                    {{ __('Asia/Kamchatka') }}</option>
                <option {{ $setting->timezone == 'Asia/Karachi' ? 'selected' : '' }} value="Asia/Karachi">
                    {{ __('Asia/Karachi') }}</option>
                <option {{ $setting->timezone == 'Asia/Kathmandu' ? 'selected' : '' }} value="Asia/Kathmandu">
                    {{ __('Asia/Kathmandu') }}</option>
                <option {{ $setting->timezone == 'Asia/Khandyga' ? 'selected' : '' }} value="Asia/Khandyga">
                    {{ __('Asia/Khandyga') }}</option>
                <option {{ $setting->timezone == 'Asia/Kolkata' ? 'selected' : '' }} value="Asia/Kolkata">
                    {{ __('Asia/Kolkata') }}</option>
                <option {{ $setting->timezone == 'Asia/Krasnoyarsk' ? 'selected' : '' }} value="Asia/Krasnoyarsk">
                    {{ __('Asia/Krasnoyarsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Kuala_Lumpur' ? 'selected' : '' }} value="Asia/Kuala_Lumpur">
                    {{ __('Asia/Kuala_Lumpur') }}</option>


                <option {{ $setting->timezone == 'Asia/Kuching' ? 'selected' : '' }} value="Asia/Kuching">
                    {{ __('Asia/Kuching') }}</option>
                <option {{ $setting->timezone == 'Asia/Kuwait' ? 'selected' : '' }} value="Asia/Kuwait">
                    {{ __('Asia/Kuwait') }}</option>
                <option {{ $setting->timezone == 'Asia/Macau' ? 'selected' : '' }} value="Asia/Macau">
                    {{ __('Asia/Macau') }}</option>
                <option {{ $setting->timezone == 'Asia/Magadan' ? 'selected' : '' }} value="Asia/Magadan">
                    {{ __('Asia/Magadan') }}</option>
                <option {{ $setting->timezone == 'Asia/Makassar' ? 'selected' : '' }} value="Asia/Makassar">
                    {{ __('Asia/Makassar') }}</option>
                <option {{ $setting->timezone == 'Asia/Manila' ? 'selected' : '' }} value="Asia/Manila">
                    {{ __('Asia/Manila') }}</option>
                <option {{ $setting->timezone == 'Asia/Muscat' ? 'selected' : '' }} value="Asia/Muscat">
                    {{ __('Asia/Muscat') }}</option>
                <option {{ $setting->timezone == 'Asia/Nicosia' ? 'selected' : '' }} value="Asia/Nicosia">
                    {{ __('Asia/Nicosia') }}</option>
                <option {{ $setting->timezone == 'Asia/Novokuznetsk' ? 'selected' : '' }} value="Asia/Novokuznetsk">
                    {{ __('Asia/Novokuznetsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Novosibirsk' ? 'selected' : '' }} value="Asia/Novosibirsk">
                    {{ __('Asia/Novosibirsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Omsk' ? 'selected' : '' }} value="Asia/Omsk">
                    {{ __('Asia/Omsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Oral' ? 'selected' : '' }} value="Asia/Oral">
                    {{ __('Asia/Oral') }}</option>
                <option {{ $setting->timezone == 'Asia/Phnom_Penh' ? 'selected' : '' }} value="Asia/Phnom_Penh">
                    {{ __('Asia/Phnom_Penh') }}</option>
                <option {{ $setting->timezone == 'Asia/Pontianak' ? 'selected' : '' }} value="Asia/Pontianak">
                    {{ __('Asia/Pontianak') }}</option>
                <option {{ $setting->timezone == 'Asia/Pyongyang' ? 'selected' : '' }} value="Asia/Pyongyang">
                    {{ __('Asia/Pyongyang') }}</option>
                <option {{ $setting->timezone == 'Asia/Qatar' ? 'selected' : '' }} value="Asia/Qatar">
                    {{ __('Asia/Qatar') }}</option>
                <option {{ $setting->timezone == 'Asia/Qostanay' ? 'selected' : '' }} value="Asia/Qostanay">
                    {{ __('Asia/Qostanay') }}</option>
                <option {{ $setting->timezone == 'Asia/Qyzylorda' ? 'selected' : '' }} value="Asia/Qyzylorda">
                    {{ __('Asia/Qyzylorda') }}</option>
                <option {{ $setting->timezone == 'Asia/Riyadh' ? 'selected' : '' }} value="Asia/Riyadh">
                    {{ __('Asia/Riyadh') }}</option>
                <option {{ $setting->timezone == 'Asia/Sakhalin' ? 'selected' : '' }} value="Asia/Sakhalin">
                    {{ __('Asia/Sakhalin') }}</option>
                <option {{ $setting->timezone == 'Asia/Samarkand' ? 'selected' : '' }} value="Asia/Samarkand">
                    {{ __('Asia/Samarkand') }}</option>
                <option {{ $setting->timezone == 'Asia/Seoul' ? 'selected' : '' }} value="Asia/Seoul">
                    {{ __('Asia/Seoul') }}</option>
                <option {{ $setting->timezone == 'Asia/Shanghai' ? 'selected' : '' }} value="Asia/Shanghai">
                    {{ __('Asia/Shanghai') }}</option>
                <option {{ $setting->timezone == 'Asia/Singapore' ? 'selected' : '' }} value="Asia/Singapore">
                    {{ __('Asia/Singapore') }}</option>
                <option {{ $setting->timezone == 'Asia/Srednekolymsk' ? 'selected' : '' }}
                    value="Asia/Srednekolymsk">{{ __('Asia/Srednekolymsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Taipei' ? 'selected' : '' }} value="Asia/Taipei">
                    {{ __('Asia/Taipei') }}</option>
                <option {{ $setting->timezone == 'Asia/Tashkent' ? 'selected' : '' }} value="Asia/Tashkent">
                    {{ __('Asia/Tashkent') }}</option>
                <option {{ $setting->timezone == 'Asia/Tbilisi' ? 'selected' : '' }} value="Asia/Tbilisi">
                    {{ __('Asia/Tbilisi') }}</option>
                <option {{ $setting->timezone == 'Asia/Tehran' ? 'selected' : '' }} value="Asia/Tehran">
                    {{ __('Asia/Tehran') }}</option>
                <option {{ $setting->timezone == 'Asia/Thimphu' ? 'selected' : '' }} value="Asia/Thimphu">
                    {{ __('Asia/Thimphu') }}</option>
                <option {{ $setting->timezone == 'Asia/Tokyo' ? 'selected' : '' }} value="Asia/Tokyo">
                    {{ __('Asia/Tokyo') }}</option>


                <option {{ $setting->timezone == 'Asia/Tomsk' ? 'selected' : '' }} value="Asia/Tomsk">
                    {{ __('Asia/Tomsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Ulaanbaatar' ? 'selected' : '' }} value="Asia/Ulaanbaatar">
                    {{ __('Asia/Ulaanbaatar') }}</option>
                <option {{ $setting->timezone == 'Asia/Urumqi' ? 'selected' : '' }} value="Asia/Urumqi">
                    {{ __('Asia/Urumqi') }}</option>
                <option {{ $setting->timezone == 'Asia/Ust-Nera' ? 'selected' : '' }} value="Asia/Ust-Nera">
                    {{ __('Asia/Ust-Nera') }}</option>
                <option {{ $setting->timezone == 'Asia/Vientiane' ? 'selected' : '' }} value="Asia/Vientiane">
                    {{ __('Asia/Vientiane') }}</option>
                <option {{ $setting->timezone == 'Asia/Vladivostok' ? 'selected' : '' }} value="Asia/Vladivostok">
                    {{ __('Asia/Vladivostok') }}</option>
                <option {{ $setting->timezone == 'Asia/Yakutsk' ? 'selected' : '' }} value="Asia/Yakutsk">
                    {{ __('Asia/Yakutsk') }}</option>
                <option {{ $setting->timezone == 'Asia/Yangon' ? 'selected' : '' }} value="Asia/Yangon">
                    {{ __('Asia/Yangon') }}</option>
                <option {{ $setting->timezone == 'Asia/Yekaterinburg' ? 'selected' : '' }}
                    value="Asia/Yekaterinburg">{{ __('Asia/Yekaterinburg') }}</option>
                <option {{ $setting->timezone == 'Asia/Yerevan' ? 'selected' : '' }} value="Asia/Yerevan">
                    {{ __('Asia/Yerevan') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Azores' ? 'selected' : '' }} value="Atlantic/Azores">
                    {{ __('Atlantic/Azores') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Bermuda' ? 'selected' : '' }} value="Atlantic/Bermuda">
                    {{ __('Atlantic/Bermuda') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Canary' ? 'selected' : '' }} value="Atlantic/Canary">
                    {{ __('Atlantic/Canary') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Cape_Verde' ? 'selected' : '' }}
                    value="Atlantic/Cape_Verde">{{ __('Atlantic/Cape_Verde') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Faroe' ? 'selected' : '' }} value="Atlantic/Faroe">
                    {{ __('Atlantic/Faroe') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Madeira' ? 'selected' : '' }} value="Atlantic/Madeira">
                    {{ __('Atlantic/Madeira') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Reykjavik' ? 'selected' : '' }}
                    value="Atlantic/Reykjavik">{{ __('Atlantic/Reykjavik') }}</option>
                <option {{ $setting->timezone == 'Atlantic/South_Georgia' ? 'selected' : '' }}
                    value="Atlantic/South_Georgia">{{ __('Atlantic/South_Georgia') }}</option>
                <option {{ $setting->timezone == 'Atlantic/St_Helena' ? 'selected' : '' }}
                    value="Atlantic/St_Helena">{{ __('Atlantic/St_Helena') }}</option>
                <option {{ $setting->timezone == 'Atlantic/Stanley' ? 'selected' : '' }} value="Atlantic/Stanley">
                    {{ __('Atlantic/Stanley') }}</option>
                <option {{ $setting->timezone == 'Australia/Adelaide' ? 'selected' : '' }}
                    value="Australia/Adelaide">{{ __('Australia/Adelaide') }}</option>
                <option {{ $setting->timezone == 'Australia/Brisbane' ? 'selected' : '' }}
                    value="Australia/Brisbane">{{ __('Australia/Brisbane') }}</option>
                <option {{ $setting->timezone == 'Australia/Broken_Hill' ? 'selected' : '' }}
                    value="Australia/Broken_Hill">{{ __('Australia/Broken_Hill') }}</option>
                <option {{ $setting->timezone == 'Australia/Darwin' ? 'selected' : '' }} value="Australia/Darwin">
                    {{ __('Australia/Darwin') }}</option>
                <option {{ $setting->timezone == 'Australia/Eucla' ? 'selected' : '' }} value="Australia/Eucla">
                    {{ __('Australia/Eucla') }}</option>
                <option {{ $setting->timezone == 'Australia/Hobart' ? 'selected' : '' }} value="Australia/Hobart">
                    {{ __('Australia/Hobart') }}</option>
                <option {{ $setting->timezone == 'Australia/Lindeman' ? 'selected' : '' }}
                    value="Australia/Lindeman">{{ __('Australia/Lindeman') }}</option>
                <option {{ $setting->timezone == 'Australia/Lord_Howe' ? 'selected' : '' }}
                    value="Australia/Lord_Howe">{{ __('Australia/Lord_Howe') }}</option>
                <option {{ $setting->timezone == 'Australia/Melbourne' ? 'selected' : '' }}
                    value="Australia/Melbourne">{{ __('Australia/Melbourne') }}</option>
                <option {{ $setting->timezone == 'Australia/Perth' ? 'selected' : '' }} value="Australia/Perth">
                    {{ __('Australia/Perth') }}</option>

                <option {{ $setting->timezone == 'Australia/Sydney' ? 'selected' : '' }} value="Australia/Sydney">
                    {{ __('Australia/Sydney') }}</option>
                <option {{ $setting->timezone == 'Europe/Amsterdam' ? 'selected' : '' }} value="Europe/Amsterdam">
                    {{ __('Europe/Amsterdam') }}</option>
                <option {{ $setting->timezone == 'Europe/Andorra' ? 'selected' : '' }} value="Europe/Andorra">
                    {{ __('Europe/Andorra') }}</option>
                <option {{ $setting->timezone == 'Europe/Astrakhan' ? 'selected' : '' }} value="Europe/Astrakhan">
                    {{ __('Europe/Astrakhan') }}</option>
                <option {{ $setting->timezone == 'Europe/Athens' ? 'selected' : '' }} value="Europe/Athens">
                    {{ __('Europe/Athens') }}</option>
                <option {{ $setting->timezone == 'Europe/Belgrade' ? 'selected' : '' }} value="Europe/Belgrade">
                    {{ __('Europe/Belgrade') }}</option>
                <option {{ $setting->timezone == 'Europe/Berlin' ? 'selected' : '' }} value="Europe/Berlin">
                    {{ __('Europe/Berlin') }}</option>
                <option {{ $setting->timezone == 'Europe/Bratislava' ? 'selected' : '' }} value="Europe/Bratislava">
                    {{ __('Europe/Bratislava') }}</option>
                <option {{ $setting->timezone == 'Europe/Brussels' ? 'selected' : '' }} value="Europe/Brussels">
                    {{ __('Europe/Brussels') }}</option>
                <option {{ $setting->timezone == 'Europe/Bucharest' ? 'selected' : '' }} value="Europe/Bucharest">
                    {{ __('Europe/Bucharest') }}</option>
                <option {{ $setting->timezone == 'Europe/Budapest' ? 'selected' : '' }} value="Europe/Budapest">
                    {{ __('Europe/Budapest') }}</option>
                <option {{ $setting->timezone == 'Europe/Busingen' ? 'selected' : '' }} value="Europe/Busingen">
                    {{ __('Europe/Busingen') }}</option>
                <option {{ $setting->timezone == 'Europe/Chisinau' ? 'selected' : '' }} value="Europe/Chisinau">
                    {{ __('Europe/Chisinau') }}</option>
                <option {{ $setting->timezone == 'Europe/Copenhagen' ? 'selected' : '' }} value="Europe/Copenhagen">
                    {{ __('Europe/Copenhagen') }}</option>
                <option {{ $setting->timezone == 'Europe/Dublin' ? 'selected' : '' }} value="Europe/Dublin">
                    {{ __('Europe/Dublin') }}</option>
                <option {{ $setting->timezone == 'Europe/Gibraltar' ? 'selected' : '' }} value="Europe/Gibraltar">
                    {{ __('Europe/Gibraltar') }}</option>
                <option {{ $setting->timezone == 'Europe/Guernsey' ? 'selected' : '' }} value="Europe/Guernsey">
                    {{ __('Europe/Guernsey') }}</option>
                <option {{ $setting->timezone == 'Europe/Helsinki' ? 'selected' : '' }} value="Europe/Helsinki">
                    {{ __('Europe/Helsinki') }}</option>
                <option {{ $setting->timezone == 'Europe/Isle_of_Man' ? 'selected' : '' }}
                    value="Europe/Isle_of_Man">{{ __('Europe/Isle_of_Man') }}</option>
                <option {{ $setting->timezone == 'Europe/Istanbul' ? 'selected' : '' }} value="Europe/Istanbul">
                    {{ __('Europe/Istanbul') }}</option>
                <option {{ $setting->timezone == 'Europe/Jersey' ? 'selected' : '' }} value="Europe/Jersey">
                    {{ __('Europe/Jersey') }}</option>
                <option {{ $setting->timezone == 'Europe/Kaliningrad' ? 'selected' : '' }}
                    value="Europe/Kaliningrad">{{ __('Europe/Kaliningrad') }}</option>
                <option {{ $setting->timezone == 'Europe/Kiev' ? 'selected' : '' }} value="Europe/Kiev">
                    {{ __('Europe/Kiev') }}</option>
                <option {{ $setting->timezone == 'Europe/Kirov' ? 'selected' : '' }} value="Europe/Kirov">
                    {{ __('Europe/Kirov') }}</option>
                <option {{ $setting->timezone == 'Europe/Lisbon' ? 'selected' : '' }} value="Europe/Lisbon">
                    {{ __('Europe/Lisbon') }}</option>
                <option {{ $setting->timezone == 'Europe/Ljubljana' ? 'selected' : '' }} value="Europe/Ljubljana">
                    {{ __('Europe/Ljubljana') }}</option>
                <option {{ $setting->timezone == 'Europe/London' ? 'selected' : '' }} value="Europe/London">
                    {{ __('Europe/London') }}</option>
                <option {{ $setting->timezone == 'Europe/Luxembourg' ? 'selected' : '' }} value="Europe/Luxembourg">
                    {{ __('Europe/Luxembourg') }}</option>
                <option {{ $setting->timezone == 'Europe/Madrid' ? 'selected' : '' }} value="Europe/Madrid">
                    {{ __('Europe/Madrid') }}</option>
                <option {{ $setting->timezone == 'Europe/Malta' ? 'selected' : '' }} value="Europe/Malta">
                    {{ __('Europe/Malta') }}</option>
                <option {{ $setting->timezone == 'Europe/Mariehamn' ? 'selected' : '' }} value="Europe/Mariehamn">
                    {{ __('Europe/Mariehamn') }}</option>

                <option {{ $setting->timezone == 'Europe/Minsk' ? 'selected' : '' }} value="Europe/Minsk">
                    {{ __('Europe/Minsk') }}</option>
                <option {{ $setting->timezone == 'Europe/Monaco' ? 'selected' : '' }} value="Europe/Monaco">
                    {{ __('Europe/Monaco') }}</option>
                <option {{ $setting->timezone == 'Europe/Moscow' ? 'selected' : '' }} value="Europe/Moscow">
                    {{ __('Europe/Moscow') }}</option>
                <option {{ $setting->timezone == 'Europe/Oslo' ? 'selected' : '' }} value="Europe/Oslo">
                    {{ __('Europe/Oslo') }}</option>
                <option {{ $setting->timezone == 'Europe/Paris' ? 'selected' : '' }} value="Europe/Paris">
                    {{ __('Europe/Paris') }}</option>
                <option {{ $setting->timezone == 'Europe/Podgorica' ? 'selected' : '' }} value="Europe/Podgorica">
                    {{ __('Europe/Podgorica') }}</option>
                <option {{ $setting->timezone == 'Europe/Prague' ? 'selected' : '' }} value="Europe/Prague">
                    {{ __('Europe/Prague') }}</option>
                <option {{ $setting->timezone == 'Europe/Riga' ? 'selected' : '' }} value="Europe/Riga">
                    {{ __('Europe/Riga') }}</option>
                <option {{ $setting->timezone == 'Europe/Rome' ? 'selected' : '' }} value="Europe/Rome">
                    {{ __('Europe/Rome') }}</option>
                <option {{ $setting->timezone == 'Europe/Samara' ? 'selected' : '' }} value="Europe/Samara">
                    {{ __('Europe/Samara') }}</option>
                <option {{ $setting->timezone == 'Europe/San_Marino' ? 'selected' : '' }} value="Europe/San_Marino">
                    {{ __('Europe/San_Marino') }}</option>
                <option {{ $setting->timezone == 'Europe/Sarajevo' ? 'selected' : '' }} value="Europe/Sarajevo">
                    {{ __('Europe/Sarajevo') }}</option>
                <option {{ $setting->timezone == 'Europe/Saratov' ? 'selected' : '' }} value="Europe/Saratov">
                    {{ __('Europe/Saratov') }}</option>
                <option {{ $setting->timezone == 'Europe/Simferopol' ? 'selected' : '' }} value="Europe/Simferopol">
                    {{ __('Europe/Simferopol') }}</option>
                <option {{ $setting->timezone == 'Europe/Skopje' ? 'selected' : '' }} value="Europe/Skopje">
                    {{ __('Europe/Skopje') }}</option>
                <option {{ $setting->timezone == 'Europe/Sofia' ? 'selected' : '' }} value="Europe/Sofia">
                    {{ __('Europe/Sofia') }}</option>
                <option {{ $setting->timezone == 'Europe/Stockholm' ? 'selected' : '' }} value="Europe/Stockholm">
                    {{ __('Europe/Stockholm') }}</option>
                <option {{ $setting->timezone == 'Europe/Tallinn' ? 'selected' : '' }} value="Europe/Tallinn">
                    {{ __('Europe/Tallinn') }}</option>
                <option {{ $setting->timezone == 'Europe/Tirane' ? 'selected' : '' }} value="Europe/Tirane">
                    {{ __('Europe/Tirane') }}</option>
                <option {{ $setting->timezone == 'Europe/Ulyanovsk' ? 'selected' : '' }} value="Europe/Ulyanovsk">
                    {{ __('Europe/Ulyanovsk') }}</option>
                <option {{ $setting->timezone == 'Europe/Uzhgorod' ? 'selected' : '' }} value="Europe/Uzhgorod">
                    {{ __('Europe/Uzhgorod') }}</option>
                <option {{ $setting->timezone == 'Europe/Vaduz' ? 'selected' : '' }} value="Europe/Vaduz">
                    {{ __('Europe/Vaduz') }}</option>
                <option {{ $setting->timezone == 'Europe/Vatican' ? 'selected' : '' }} value="Europe/Vatican">
                    {{ __('Europe/Vatican') }}</option>
                <option {{ $setting->timezone == 'Europe/Vienna' ? 'selected' : '' }} value="Europe/Vienna">
                    {{ __('Europe/Vienna') }}</option>
                <option {{ $setting->timezone == 'Europe/Vilnius' ? 'selected' : '' }} value="Europe/Vilnius">
                    {{ __('Europe/Vilnius') }}</option>
                <option {{ $setting->timezone == 'Europe/Volgograd' ? 'selected' : '' }} value="Europe/Volgograd">
                    {{ __('Europe/Volgograd') }}</option>
                <option {{ $setting->timezone == 'Europe/Warsaw' ? 'selected' : '' }} value="Europe/Warsaw">
                    {{ __('Europe/Warsaw') }}</option>
                <option {{ $setting->timezone == 'Europe/Zagreb' ? 'selected' : '' }} value="Europe/Zagreb">
                    {{ __('Europe/Zagreb') }}</option>
                <option {{ $setting->timezone == 'Europe/Zaporozhye' ? 'selected' : '' }} value="Europe/Zaporozhye">
                    {{ __('Europe/Zaporozhye') }}</option>
                <option {{ $setting->timezone == 'Europe/Zurich' ? 'selected' : '' }} value="Europe/Zurich">
                    {{ __('Europe/Zurich') }}</option>
                <option {{ $setting->timezone == 'Indian/Antananarivo' ? 'selected' : '' }}
                    value="Indian/Antananarivo">{{ __('Indian/Antananarivo') }}</option>
                <option {{ $setting->timezone == 'Indian/Chagos' ? 'selected' : '' }} value="Indian/Chagos">
                    {{ __('Indian/Chagos') }}</option>

                <option {{ $setting->timezone == 'Indian/Christmas' ? 'selected' : '' }} value="Indian/Christmas">
                    {{ __('Indian/Christmas') }}</option>
                <option {{ $setting->timezone == 'Indian/Cocos' ? 'selected' : '' }} value="Indian/Cocos">
                    {{ __('Indian/Cocos') }}</option>
                <option {{ $setting->timezone == 'Indian/Comoro' ? 'selected' : '' }} value="Indian/Comoro">
                    {{ __('Indian/Comoro') }}</option>
                <option {{ $setting->timezone == 'Indian/Kerguelen' ? 'selected' : '' }} value="Indian/Kerguelen">
                    {{ __('Indian/Kerguelen') }}</option>
                <option {{ $setting->timezone == 'Indian/Mahe' ? 'selected' : '' }} value="Indian/Mahe">
                    {{ __('Indian/Mahe') }}</option>
                <option {{ $setting->timezone == 'Indian/Maldives' ? 'selected' : '' }} value="Indian/Maldives">
                    {{ __('Indian/Maldives') }}</option>
                <option {{ $setting->timezone == 'Indian/Mauritius' ? 'selected' : '' }} value="Indian/Mauritius">
                    {{ __('Indian/Mauritius') }}</option>
                <option {{ $setting->timezone == 'Indian/Mayotte' ? 'selected' : '' }} value="Indian/Mayotte">
                    {{ __('Indian/Mayotte') }}</option>
                <option {{ $setting->timezone == 'Indian/Reunion' ? 'selected' : '' }} value="Indian/Reunion">
                    {{ __('Indian/Reunion') }}</option>
                <option {{ $setting->timezone == 'Pacific/Apia' ? 'selected' : '' }} value="Pacific/Apia">
                    {{ __('Pacific/Apia') }}</option>
                <option {{ $setting->timezone == 'Pacific/Auckland' ? 'selected' : '' }} value="Pacific/Auckland">
                    {{ __('Pacific/Auckland') }}</option>
                <option {{ $setting->timezone == 'Pacific/Bougainville' ? 'selected' : '' }}
                    value="Pacific/Bougainville">{{ __('Pacific/Bougainville') }}</option>
                <option {{ $setting->timezone == 'Pacific/Chatham' ? 'selected' : '' }} value="Pacific/Chatham">
                    {{ __('Pacific/Chatham') }}</option>
                <option {{ $setting->timezone == 'Pacific/Chuuk' ? 'selected' : '' }} value="Pacific/Chuuk">
                    {{ __('Pacific/Chuuk') }}</option>
                <option {{ $setting->timezone == 'Pacific/Easter' ? 'selected' : '' }} value="Pacific/Easter">
                    {{ __('Pacific/Easter') }}</option>
                <option {{ $setting->timezone == 'Pacific/Efate' ? 'selected' : '' }} value="Pacific/Efate">
                    {{ __('Pacific/Efate') }}</option>
                <option {{ $setting->timezone == 'Pacific/Enderbury' ? 'selected' : '' }} value="Pacific/Enderbury">
                    {{ __('Pacific/Enderbury') }}</option>
                <option {{ $setting->timezone == 'Pacific/Fakaofo' ? 'selected' : '' }} value="Pacific/Fakaofo">
                    {{ __('Pacific/Fakaofo') }}</option>
                <option {{ $setting->timezone == 'Pacific/Fiji' ? 'selected' : '' }} value="Pacific/Fiji">
                    {{ __('Pacific/Fiji') }}</option>
                <option {{ $setting->timezone == 'Pacific/Funafuti' ? 'selected' : '' }} value="Pacific/Funafuti">
                    {{ __('Pacific/Funafuti') }}</option>
                <option {{ $setting->timezone == 'Pacific/Galapagos' ? 'selected' : '' }} value="Pacific/Galapagos">
                    {{ __('Pacific/Galapagos') }}</option>
                <option {{ $setting->timezone == 'Pacific/Gambier' ? 'selected' : '' }} value="Pacific/Gambier">
                    {{ __('Pacific/Gambier') }}</option>
                <option {{ $setting->timezone == 'Pacific/Guadalcanal' ? 'selected' : '' }}
                    value="Pacific/Guadalcanal">{{ __('Pacific/Guadalcanal') }}</option>
                <option {{ $setting->timezone == 'Pacific/Guam' ? 'selected' : '' }} value="Pacific/Guam">
                    {{ __('Pacific/Guam') }}</option>
                <option {{ $setting->timezone == 'Pacific/Honolulu' ? 'selected' : '' }} value="Pacific/Honolulu">
                    {{ __('Pacific/Honolulu') }}</option>
                <option {{ $setting->timezone == 'Pacific/Kiritimati' ? 'selected' : '' }}
                    value="Pacific/Kiritimati">{{ __('Pacific/Kiritimati') }}</option>
                <option {{ $setting->timezone == 'Pacific/Kosrae' ? 'selected' : '' }} value="Pacific/Kosrae">
                    {{ __('Pacific/Kosrae') }}</option>
                <option {{ $setting->timezone == 'Pacific/Kwajalein' ? 'selected' : '' }} value="Pacific/Kwajalein">
                    {{ __('Pacific/Kwajalein') }}</option>
                <option {{ $setting->timezone == 'Pacific/Majuro' ? 'selected' : '' }} value="Pacific/Majuro">
                    {{ __('Pacific/Majuro') }}</option>
                <option {{ $setting->timezone == 'Pacific/Marquesas' ? 'selected' : '' }} value="Pacific/Marquesas">
                    {{ __('Pacific/Marquesas') }}</option>
                <option {{ $setting->timezone == 'Pacific/Midway' ? 'selected' : '' }} value="Pacific/Midway">
                    {{ __('Pacific/Midway') }}</option>
                <option {{ $setting->timezone == 'Pacific/Nauru' ? 'selected' : '' }} value="Pacific/Nauru">
                    {{ __('Pacific/Nauru') }}</option>
                <option {{ $setting->timezone == 'IPacific/Niue' ? 'selected' : '' }} value="Pacific/Niue">
                    {{ __('Pacific/Niue') }}</option>
                <option {{ $setting->timezone == 'Pacific/Norfolk' ? 'selected' : '' }} value="Pacific/Norfolk">
                    {{ __('Pacific/Norfolk') }}</option>
                <option {{ $setting->timezone == 'Pacific/Noumea' ? 'selected' : '' }} value="Pacific/Noumea">
                    {{ __('Pacific/Noumea') }}</option>
                <option {{ $setting->timezone == 'Pacific/Pago_Pago' ? 'selected' : '' }} value="Pacific/Pago_Pago">
                    {{ __('Pacific/Pago_Pago') }}</option>
                <option {{ $setting->timezone == 'Pacific/Palau' ? 'selected' : '' }} value="Pacific/Palau">
                    {{ __('Pacific/Palau') }}</option>
                <option {{ $setting->timezone == 'Pacific/Pitcairn' ? 'selected' : '' }} value="Pacific/Pitcairn">
                    {{ __('Pacific/Pitcairn') }}</option>
                <option {{ $setting->timezone == 'Pacific/Pohnpei' ? 'selected' : '' }} value="Pacific/Pohnpei">
                    {{ __('Pacific/Pohnpei') }}</option>
                <option {{ $setting->timezone == 'Pacific/Port_Moresby' ? 'selected' : '' }}
                    value="Pacific/Port_Moresby">{{ __('Pacific/Port_Moresby') }}</option>
                <option {{ $setting->timezone == 'Pacific/Rarotonga' ? 'selected' : '' }} value="Pacific/Rarotonga">
                    {{ __('Pacific/Rarotonga') }}</option>
                <option {{ $setting->timezone == 'Pacific/Saipan' ? 'selected' : '' }} value="Pacific/Saipan">
                    {{ __('Pacific/Saipan') }}</option>
                <option {{ $setting->timezone == 'Pacific/Tahiti' ? 'selected' : '' }} value="Pacific/Tahiti">
                    {{ __('Pacific/Tahiti') }}</option>
                <option {{ $setting->timezone == 'Pacific/Tarawa' ? 'selected' : '' }} value="Pacific/Tarawa">
                    {{ __('Pacific/Tarawa') }}</option>
                <option {{ $setting->timezone == 'Pacific/Tongatapu' ? 'selected' : '' }} value="Pacific/Tongatapu">
                    {{ __('Pacific/Tongatapu') }}</option>
                <option {{ $setting->timezone == 'Pacific/Wake' ? 'selected' : '' }} value="Pacific/Wake">
                    {{ __('Pacific/Wake') }}</option>
                <option {{ $setting->timezone == 'Pacific/Wallis' ? 'selected' : '' }} value="Pacific/Wallis">
                    {{ __('Pacific/Wallis') }}</option>
                <option {{ $setting->timezone == 'UTC' ? 'selected' : '' }} value="UTC">{{ __('UTC') }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="is_queable">{{ __('Send Mails In Queue') }}<span class="text-danger">*</span></label>
            <select name="is_queable" id="is_queable" class="form-select">
                <option {{ $setting->is_queable == 'active' ? 'selected' : '' }} value="active">{{ __('Enable') }}
                </option>
                <option {{ $setting->is_queable == 'inactive' ? 'selected' : '' }} value="inactive">
                    {{ __('Disable') }}
                </option>
            </select>
            @if ($setting->is_queable == 'active')
                <div class="pt-1 text-info"><span class="text-success ">{{ __('Copy and Run This Command') }}:
                    </span>
                    <strong id="copyCronText" onclick="copyText()" title="{{ __('Click to copy') }}"
                        onmouseover="this.style.cursor='pointer'">php artisan schedule:run >>
                        /dev/null
                        2>&1</strong>
                </div>
                <div class="pt-1 text-warning">
                    <b>{{ __('If enabled, you must setup cron job in your server. otherwise it will not work and no mail will be sent') }}</b>
                </div>
            @endif
        </div>

        <x-admin.update-button :text="__('Update')"></x-admin.update-button>

    </form>
</div>
