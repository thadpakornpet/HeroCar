<?php
$name = !empty($user->id) ? old('name', $user->name) : old('name', '');
$email = !empty($user->id) ? old('email', $user->email) : old('email', '');
if (isset($user->getprofiles->phone1)) {
    $phone1 = $user->getprofiles->phone1;
} else {
    $phone1 = '';
}

if (isset($user->getprofiles->address1)) {
    $address1 = $user->getprofiles->address1;
} else {
    $address1 = '';
}

if (isset($user->getprofiles->zipcode1)) {
    $zipcode1 = $user->getprofiles->zipcode1;
} else {
    $zipcode1 = '';
}

if (isset($user->getprofiles->country)) {
    $conuntry = $user->getprofiles->country;
} else {
    $conuntry = '';
}
//$phone1 = !empty($user->id) ? old('phone1', $user->getprofiles->phone1) : old('phone1', '');
//$phone2 = !empty($user->id) ? old('phone2', $user->getprofiles->phone2) : old('phone2', '');
// $address1 = !empty($user->id) ? old('address1', $user->getprofiles->address1) : old('address1', '');
//
// $road1 = !empty($user->id) ? old('road', $user->getprofiles->road1) : old('road1', '');
// $subdistrict1 = !empty($user->id) ? old('subdistrict1', $user->getprofiles->subdistrict1) : old('subdistrict1', '');
// $district1 = !empty($user->id) ? old('district1', $user->getprofiles->district1) : old('district1', '');
// $province1 = !empty($user->id) ? old('province1', $user->getprofiles->province1) : old('province1', '');
// $zipcode1 = !empty($user->id) ? old('zipcode1', $user->getprofiles->zipcode1) : old('zipcode1', '');
//
//
// $address2 = !empty($user->id) ? old('address2', $user->getprofiles->address2) : old('address2', '');
// $road2 = !empty($user->id) ? old('road', $user->getprofiles->road2) : old('road2', '');
// $subdistrict2 = !empty($user->id) ? old('subdistrict2', $user->getprofiles->subdistrict2) : old('subdistrict2', '');
// $district2 = !empty($user->id) ? old('district2', $user->getprofiles->district1) : old('district2', '');
// $province2 = !empty($user->id) ? old('province2', $user->getprofiles->province2) : old('province2', '');
// $zipcode2 = !empty($user->id) ? old('zipcode2', $user->getprofiles->zipcode2) : old('zipcode2', '');
?>
@if(!empty($user->id))
    <form action="{{ route( 'users.update',$user) }}" method="post" class="form-horizontal">
        {{ method_field('PUT') }}
        @else
            <form action="{!! route('users.store') !!}" method="post" class="form-horizontal">
                @endif
                {!! csrf_field() !!}

                <div class="form-group row">
                    <label class="col-md-1 col-form-label text-required">@lang('logs.email') : </label>
                    <div class="col-sm-5">
                        <input type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email"
                               value="{!! $email !!}">
                    </div>

                    <label class="col-md-1 col-form-label text-required">@lang('logs.name') : </label>
                    <div class="col-sm-5">
                        <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name"
                               value="{!! $name !!}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <br/>
                        <h3>@lang('logs.addresspresent')</h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-required">@lang('logs.phone') : </label>
                                    <div class="col-sm-10">
                                        <input type="text" style="font-family: 'Pridi', serif;" class="form-control"
                                               name="phone1" value="{!! $phone1 !!}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-md-2 col-form-label text-required">@lang('logs.address')
                                        : </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="font-family: 'Pridi', serif;"
                                                  name="address1" rows="3">{!! $address1 !!}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="10" class="col-md-2 col-form-label text-required">@lang('logs.zip')
                                        : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" style="font-family: 'Pridi', serif;"
                                               required id="zipcode1" name="zipcode1" value="{!! $zipcode1 !!}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="10"
                                           class="col-md-2 col-form-label text-required">@lang('logs.country')
                                        : </label>
                                    <div class="col-sm-10">
                                        <select id="country" name="country" class="form-control" required>
                                            <option value="" disabled selected>--@lang('logs.select')--</option>
                                            <option value="Afghanistan" @if($conuntry == 'Afghanistan') selected @endif>Afghanistan</option>
                                            <option value="Åland Islands" @if($conuntry == 'Åland Islands') selected @endif>Åland Islands</option>
                                            <option value="Albania" @if($conuntry == 'Albania') selected @endif>Albania</option>
                                            <option value="Algeria" @if($conuntry == 'Algeria') selected @endif>Algeria</option>
                                            <option value="American Samoa" @if($conuntry == 'American Samoa') selected @endif>American Samoa</option>
                                            <option value="Andorra" @if($conuntry == 'Andorra') selected @endif>Andorra</option>
                                            <option value="Angola" @if($conuntry == 'Angola') selected @endif>Angola</option>
                                            <option value="Anguilla" @if($conuntry == 'Anguilla') selected @endif>Anguilla</option>
                                            <option value="Antarctica" @if($conuntry == 'Antarctica') selected @endif>Antarctica</option>
                                            <option value="Antigua and Barbuda" @if($conuntry == 'Antigua and Barbuda') selected @endif>Antigua and Barbuda</option>
                                            <option value="Argentina" @if($conuntry == 'Argentina') selected @endif>Argentina</option>
                                            <option value="Armenia" @if($conuntry == 'Armenia') selected @endif>Armenia</option>
                                            <option value="Aruba" @if($conuntry == 'Aruba') selected @endif>Aruba</option>
                                            <option value="Australia" @if($conuntry == 'Australia') selected @endif>Australia</option>
                                            <option value="Austria" @if($conuntry == 'Austria') selected @endif>Austria</option>
                                            <option value="Azerbaijan" @if($conuntry == 'Azerbaijan') selected @endif>Azerbaijan</option>
                                            <option value="Bahamas" @if($conuntry == 'Bahamas') selected @endif>Bahamas</option>
                                            <option value="Bahrain" @if($conuntry == 'Bahrain') selected @endif>Bahrain</option>
                                            <option value="Bangladesh" @if($conuntry == 'Bangladesh') selected @endif>Bangladesh</option>
                                            <option value="Barbados" @if($conuntry == 'Barbados') selected @endif>Barbados</option>
                                            <option value="Belarus" @if($conuntry == 'Belarus') selected @endif>Belarus</option>
                                            <option value="Belgium" @if($conuntry == 'Belgium') selected @endif>Belgium</option>
                                            <option value="Belize" @if($conuntry == 'Belize') selected @endif>Belize</option>
                                            <option value="Benin" @if($conuntry == 'Benin') selected @endif>Benin</option>
                                            <option value="Bermuda" @if($conuntry == 'Bermuda') selected @endif>Bermuda</option>
                                            <option value="Bhutan" @if($conuntry == 'Bhutan') selected @endif>Bhutan</option>
                                            <option value="Bolivia" @if($conuntry == 'Bolivia') selected @endif>Bolivia</option>
                                            <option value="Bosnia and Herzegovina" @if($conuntry == 'Bosnia and Herzegovina') selected @endif>Bosnia and Herzegovina</option>
                                            <option value="Botswana" @if($conuntry == 'Botswana') selected @endif>Botswana</option>
                                            <option value="Bouvet Island" @if($conuntry == 'Bouvet Island') selected @endif>Bouvet Island</option>
                                            <option value="Brazil" @if($conuntry == 'Brazil') selected @endif>Brazil</option>
                                            <option value="British Indian Ocean Territory" @if($conuntry == 'British Indian Ocean Territory') selected @endif>British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam" @if($conuntry == 'Brunei Darussalam') selected @endif>Brunei Darussalam</option>
                                            <option value="Bulgaria" @if($conuntry == 'Bulgaria') selected @endif>Bulgaria</option>
                                            <option value="Burkina Faso" @if($conuntry == 'Burkina Faso') selected @endif>Burkina Faso</option>
                                            <option value="Burundi" @if($conuntry == 'Burundi') selected @endif>Burundi</option>
                                            <option value="Cambodia" @if($conuntry == 'Cambodia') selected @endif>Cambodia</option>
                                            <option value="Cameroon" @if($conuntry == 'Cameroon') selected @endif>Cameroon</option>
                                            <option value="Canada" @if($conuntry == 'Canada') selected @endif>Canada</option>
                                            <option value="Cape Verde" @if($conuntry == 'Cape Verde') selected @endif>Cape Verde</option>
                                            <option value="Cayman Islands" @if($conuntry == 'Cayman Islands') selected @endif>Cayman Islands</option>
                                            <option value="Central African Republic" @if($conuntry == 'Central African Republic') selected @endif>Central African Republic</option>
                                            <option value="Chad" @if($conuntry == 'Chad') selected @endif>Chad</option>
                                            <option value="Chile" @if($conuntry == 'Chile') selected @endif>Chile</option>
                                            <option value="China" @if($conuntry == 'China') selected @endif>China</option>
                                            <option value="Christmas Island" @if($conuntry == 'Christmas Island') selected @endif>Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands" @if($conuntry == 'Cocos (Keeling) Islands') selected @endif>Cocos (Keeling) Islands</option>
                                            <option value="Colombia" @if($conuntry == 'Colombia') selected @endif>Colombia</option>
                                            <option value="Comoros" @if($conuntry == 'Comoros') selected @endif>Comoros</option>
                                            <option value="Congo" @if($conuntry == 'Congo') selected @endif>Congo</option>
                                            <option value="Congo, The Democratic Republic of The" @if($conuntry == 'Congo, The Democratic Republic of The') selected @endif>Congo, The Democratic
                                                Republic of The
                                            </option>
                                            <option value="Cook Islands" @if($conuntry == 'Cook Islands') selected @endif>Cook Islands</option>
                                            <option value="Costa Rica" @if($conuntry == 'Costa Rica') selected @endif>Costa Rica</option>
                                            <option value="Cote D'ivoire" @if($conuntry == "Cote D'ivoire") selected @endif>Cote D'ivoire</option>
                                            <option value="Croatia" @if($conuntry == 'Croatia') selected @endif>Croatia</option>
                                            <option value="Cuba" @if($conuntry == 'Cuba') selected @endif>Cuba</option>
                                            <option value="Cyprus" @if($conuntry == 'Cyprus') selected @endif>Cyprus</option>
                                            <option value="Czech Republic" @if($conuntry == 'Czech Republic') selected @endif>Czech Republic</option>
                                            <option value="Denmark" @if($conuntry == 'Denmark') selected @endif>Denmark</option>
                                            <option value="Djibouti" @if($conuntry == 'Djibouti') selected @endif>Djibouti</option>
                                            <option value="Dominica" @if($conuntry == 'Dominica') selected @endif>Dominica</option>
                                            <option value="Dominican Republic" @if($conuntry == 'Dominican Republic') selected @endif>Dominican Republic</option>
                                            <option value="Ecuador" @if($conuntry == 'Ecuador') selected @endif>Ecuador</option>
                                            <option value="Egypt" @if($conuntry == 'Egypt') selected @endif>Egypt</option>
                                            <option value="El Salvador" @if($conuntry == 'El Salvador') selected @endif>El Salvador</option>
                                            <option value="Equatorial Guinea" @if($conuntry == 'Equatorial Guinea') selected @endif>Equatorial Guinea</option>
                                            <option value="Eritrea" @if($conuntry == 'Eritrea') selected @endif>Eritrea</option>
                                            <option value="Estonia" @if($conuntry == 'Estonia') selected @endif>Estonia</option>
                                            <option value="Ethiopia" @if($conuntry == 'Ethiopia') selected @endif>Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)" @if($conuntry == 'Falkland Islands (Malvinas)') selected @endif>Falkland Islands (Malvinas)
                                            </option>
                                            <option value="Faroe Islands" @if($conuntry == 'Faroe Islands') selected @endif>Faroe Islands</option>
                                            <option value="Fiji" @if($conuntry == 'Fiji') selected @endif>Fiji</option>
                                            <option value="Finland" @if($conuntry == 'Finland') selected @endif>Finland</option>
                                            <option value="France" @if($conuntry == 'France') selected @endif>France</option>
                                            <option value="French Guiana" @if($conuntry == 'French Guiana') selected @endif>French Guiana</option>
                                            <option value="French Polynesia" @if($conuntry == 'French Polynesia') selected @endif>French Polynesia</option>
                                            <option value="French Southern Territories" @if($conuntry == 'French Southern Territories') selected @endif>French Southern Territories
                                            </option>
                                            <option value="Gabon" @if($conuntry == 'Gabon') selected @endif>Gabon</option>
                                            <option value="Gambia" @if($conuntry == 'Gambia') selected @endif>Gambia</option>
                                            <option value="Georgia" @if($conuntry == 'Georgia') selected @endif>Georgia</option>
                                            <option value="Germany" @if($conuntry == 'Germany') selected @endif>Germany</option>
                                            <option value="Ghana" @if($conuntry == 'Ghana') selected @endif>Ghana</option>
                                            <option value="Gibraltar" @if($conuntry == 'Gibraltar') selected @endif>Gibraltar</option>
                                            <option value="Greece" @if($conuntry == 'Greece') selected @endif>Greece</option>
                                            <option value="Greenland" @if($conuntry == 'Greenland') selected @endif>Greenland</option>
                                            <option value="Grenada" @if($conuntry == 'Grenada') selected @endif>Grenada</option>
                                            <option value="Guadeloupe" @if($conuntry == 'Guadeloupe') selected @endif>Guadeloupe</option>
                                            <option value="Guam" @if($conuntry == 'Guam') selected @endif>Guam</option>
                                            <option value="Guatemala" @if($conuntry == 'Guatemala') selected @endif>Guatemala</option>
                                            <option value="Guernsey" @if($conuntry == 'Guernsey') selected @endif>Guernsey</option>
                                            <option value="Guinea" @if($conuntry == 'Guinea') selected @endif>Guinea</option>
                                            <option value="Guinea-bissau" @if($conuntry == 'Guinea-bissau') selected @endif>Guinea-bissau</option>
                                            <option value="Guyana" @if($conuntry == 'Guyana') selected @endif>Guyana</option>
                                            <option value="Haiti" @if($conuntry == 'Haiti') selected @endif>Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands" @if($conuntry == 'Heard Island and Mcdonald Islands') selected @endif>Heard Island and Mcdonald
                                                Islands
                                            </option>
                                            <option value="Holy See (Vatican City State)" @if($conuntry == 'Holy See (Vatican City State)') selected @endif>Holy See (Vatican City
                                                State)
                                            </option>
                                            <option value="Honduras" @if($conuntry == 'Honduras') selected @endif>Honduras</option>
                                            <option value="Hong Kong" @if($conuntry == 'Hong Kong') selected @endif>Hong Kong</option>
                                            <option value="Hungary" @if($conuntry == 'Hungary') selected @endif>Hungary</option>
                                            <option value="Iceland" @if($conuntry == 'Iceland') selected @endif>Iceland</option>
                                            <option value="India" @if($conuntry == 'India') selected @endif>India</option>
                                            <option value="Indonesia" @if($conuntry == 'Indonesia') selected @endif>Indonesia</option>
                                            <option value="Iran, Islamic Republic of" @if($conuntry == 'Iran, Islamic Republic of') selected @endif>Iran, Islamic Republic of</option>
                                            <option value="Iraq" @if($conuntry == 'Iraq') selected @endif>Iraq</option>
                                            <option value="Ireland" @if($conuntry == 'Ireland') selected @endif>Ireland</option>
                                            <option value="Isle of Man" @if($conuntry == 'Isle of Man') selected @endif>Isle of Man</option>
                                            <option value="Israel" @if($conuntry == 'Israel') selected @endif>Israel</option>
                                            <option value="Italy" @if($conuntry == 'Italy') selected @endif>Italy</option>
                                            <option value="Jamaica" @if($conuntry == 'Jamaica') selected @endif>Jamaica</option>
                                            <option value="Japan" @if($conuntry == 'Japan') selected @endif>Japan</option>
                                            <option value="Jersey" @if($conuntry == 'Jersey') selected @endif>Jersey</option>
                                            <option value="Jordan" @if($conuntry == 'Jordan') selected @endif>Jordan</option>
                                            <option value="Kazakhstan" @if($conuntry == 'Kazakhstan') selected @endif>Kazakhstan</option>
                                            <option value="Kenya" @if($conuntry == 'Kenya') selected @endif>Kenya</option>
                                            <option value="Kiribati" @if($conuntry == 'Kiribati') selected @endif>Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of" @if($conuntry == "Korea, Democratic People's Republic of") selected @endif>Korea, Democratic
                                                People's Republic of
                                            </option>
                                            <option value="Korea, Republic of" @if($conuntry == 'Korea, Republic of') selected @endif>Korea, Republic of</option>
                                            <option value="Kuwait" @if($conuntry == 'Kuwait') selected @endif>Kuwait</option>
                                            <option value="Kyrgyzstan" @if($conuntry == 'Kyrgyzstan') selected @endif>Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic" @if($conuntry == "Lao People's Democratic Republic") selected @endif>Lao People's Democratic
                                                Republic
                                            </option>
                                            <option value="Latvia" @if($conuntry == 'Latvia') selected @endif>Latvia</option>
                                            <option value="Lebanon" @if($conuntry == 'Lebanon') selected @endif>Lebanon</option>
                                            <option value="Lesotho" @if($conuntry == 'Lesotho') selected @endif>Lesotho</option>
                                            <option value="Liberia" @if($conuntry == 'Liberia') selected @endif>Liberia</option>
                                            <option value="Libyan Arab Jamahiriya" @if($conuntry == 'Libyan Arab Jamahiriya') selected @endif>Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein" @if($conuntry == 'Liechtenstein') selected @endif>Liechtenstein</option>
                                            <option value="Lithuania" @if($conuntry == 'Lithuania') selected @endif>Lithuania</option>
                                            <option value="Luxembourg" @if($conuntry == 'Luxembourg') selected @endif>Luxembourg</option>
                                            <option value="Macao" @if($conuntry == 'Macao') selected @endif>Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of" @if($conuntry == 'Macedonia, The Former Yugoslav Republic of') selected @endif>Macedonia, The
                                                Former Yugoslav Republic of
                                            </option>
                                            <option value="Madagascar" @if($conuntry == 'Madagascar') selected @endif>Madagascar</option>
                                            <option value="Malawi" @if($conuntry == 'Malawi') selected @endif>Malawi</option>
                                            <option value="Malaysia" @if($conuntry == 'Malaysia') selected @endif>Malaysia</option>
                                            <option value="Maldives" @if($conuntry == 'Maldives') selected @endif>Maldives</option>
                                            <option value="Mali" @if($conuntry == 'Mali') selected @endif>Mali</option>
                                            <option value="Malta" @if($conuntry == 'Malta') selected @endif>Malta</option>
                                            <option value="Marshall Islands" @if($conuntry == 'Marshall Islands') selected @endif>Marshall Islands</option>
                                            <option value="Martinique" @if($conuntry == 'Martinique') selected @endif>Martinique</option>
                                            <option value="Mauritania" @if($conuntry == 'Mauritania') selected @endif>Mauritania</option>
                                            <option value="Mauritius" @if($conuntry == 'Mauritius') selected @endif>Mauritius</option>
                                            <option value="Mayotte" @if($conuntry == 'Mayotte') selected @endif>Mayotte</option>
                                            <option value="Mexico" @if($conuntry == 'Mexico') selected @endif>Mexico</option>
                                            <option value="Micronesia, Federated States of" @if($conuntry == 'Micronesia, Federated States of') selected @endif>Micronesia, Federated States
                                                of
                                            </option>
                                            <option value="Moldova, Republic of" @if($conuntry == 'Moldova, Republic of') selected @endif>Moldova, Republic of</option>
                                            <option value="Monaco" @if($conuntry == 'Monaco') selected @endif>Monaco</option>
                                            <option value="Mongolia" @if($conuntry == 'Mongolia') selected @endif>Mongolia</option>
                                            <option value="Montenegro" @if($conuntry == 'Montenegro') selected @endif>Montenegro</option>
                                            <option value="Montserrat" @if($conuntry == 'Montserrat') selected @endif>Montserrat</option>
                                            <option value="Morocco" @if($conuntry == 'Morocco') selected @endif>Morocco</option>
                                            <option value="Mozambique" @if($conuntry == 'Mozambique') selected @endif>Mozambique</option>
                                            <option value="Myanmar" @if($conuntry == 'Myanmar') selected @endif>Myanmar</option>
                                            <option value="Namibia" @if($conuntry == 'Namibia') selected @endif>Namibia</option>
                                            <option value="Nauru" @if($conuntry == 'Nauru') selected @endif>Nauru</option>
                                            <option value="Nepal" @if($conuntry == 'Nepal') selected @endif>Nepal</option>
                                            <option value="Netherlands" @if($conuntry == 'Netherlands') selected @endif>Netherlands</option>
                                            <option value="Netherlands Antilles" @if($conuntry == 'Netherlands Antilles') selected @endif>Netherlands Antilles</option>
                                            <option value="New Caledonia" @if($conuntry == 'New Caledonia') selected @endif>New Caledonia</option>
                                            <option value="New Zealand" @if($conuntry == 'New Zealand') selected @endif>New Zealand</option>
                                            <option value="Nicaragua" @if($conuntry == 'Nicaragua') selected @endif>Nicaragua</option>
                                            <option value="Niger" @if($conuntry == 'Niger') selected @endif>Niger</option>
                                            <option value="Nigeria" @if($conuntry == 'Nigeria') selected @endif>Nigeria</option>
                                            <option value="Niue" @if($conuntry == 'Niue') selected @endif>Niue</option>
                                            <option value="Norfolk Island" @if($conuntry == 'Norfolk Island') selected @endif>Norfolk Island</option>
                                            <option value="Northern Mariana Islands" @if($conuntry == 'Northern Mariana Islands') selected @endif>Northern Mariana Islands</option>
                                            <option value="Norway" @if($conuntry == 'Norway') selected @endif>Norway</option>
                                            <option value="Oman" @if($conuntry == 'Oman') selected @endif>Oman</option>
                                            <option value="Pakistan" @if($conuntry == 'Pakistan') selected @endif>Pakistan</option>
                                            <option value="Palau" @if($conuntry == 'Palau') selected @endif>Palau</option>
                                            <option value="Palestinian Territory, Occupied" @if($conuntry == 'Palestinian Territory, Occupied') selected @endif>Palestinian Territory,
                                                Occupied
                                            </option>
                                            <option value="Panama" @if($conuntry == 'Panama') selected @endif>Panama</option>
                                            <option value="Papua New Guinea" @if($conuntry == 'Papua New Guinea') selected @endif>Papua New Guinea</option>
                                            <option value="Paraguay" @if($conuntry == 'Paraguay') selected @endif>Paraguay</option>
                                            <option value="Peru" @if($conuntry == 'Peru') selected @endif>Peru</option>
                                            <option value="Philippines" @if($conuntry == 'Philippines') selected @endif>Philippines</option>
                                            <option value="Pitcairn" @if($conuntry == 'Pitcairn') selected @endif>Pitcairn</option>
                                            <option value="Poland" @if($conuntry == 'Poland') selected @endif>Poland</option>
                                            <option value="Portugal" @if($conuntry == 'Portugal') selected @endif>Portugal</option>
                                            <option value="Puerto Rico" @if($conuntry == 'Puerto Rico') selected @endif>Puerto Rico</option>
                                            <option value="Qatar" @if($conuntry == 'Qatar') selected @endif>Qatar</option>
                                            <option value="Reunion" @if($conuntry == 'Reunion') selected @endif>Reunion</option>
                                            <option value="Romania" @if($conuntry == 'Romania') selected @endif>Romania</option>
                                            <option value="Russian Federation" @if($conuntry == 'Russian Federation') selected @endif>Russian Federation</option>
                                            <option value="Rwanda" @if($conuntry == 'Rwanda') selected @endif>Rwanda</option>
                                            <option value="Saint Helena" @if($conuntry == 'Saint Helena') selected @endif>Saint Helena</option>
                                            <option value="Saint Kitts and Nevis" @if($conuntry == 'Saint Kitts and Nevis') selected @endif>Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia" @if($conuntry == 'Saint Lucia') selected @endif>Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon" @if($conuntry == 'Saint Pierre and Miquelon') selected @endif>Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines" @if($conuntry == 'Saint Vincent and The Grenadines') selected @endif>Saint Vincent and The
                                                Grenadines
                                            </option>
                                            <option value="Samoa" @if($conuntry == 'Samoa') selected @endif>Samoa</option>
                                            <option value="San Marino" @if($conuntry == 'San Marino') selected @endif>San Marino</option>
                                            <option value="Sao Tome and Principe" @if($conuntry == 'Sao Tome and Principe') selected @endif>Sao Tome and Principe</option>
                                            <option value="Saudi Arabia" @if($conuntry == 'Saudi Arabia') selected @endif>Saudi Arabia</option>
                                            <option value="Senegal" @if($conuntry == 'Senegal') selected @endif>Senegal</option>
                                            <option value="Serbia" @if($conuntry == 'Serbia') selected @endif>Serbia</option>
                                            <option value="Seychelles" @if($conuntry == 'Seychelles') selected @endif>Seychelles</option>
                                            <option value="Sierra Leone" @if($conuntry == 'Sierra Leone') selected @endif>Sierra Leone</option>
                                            <option value="Singapore" @if($conuntry == 'Singapore') selected @endif>Singapore</option>
                                            <option value="Slovakia" @if($conuntry == 'Slovakia') selected @endif>Slovakia</option>
                                            <option value="Slovenia" @if($conuntry == 'Slovenia') selected @endif>Slovenia</option>
                                            <option value="Solomon Islands" @if($conuntry == 'Solomon Islands') selected @endif>Solomon Islands</option>
                                            <option value="Somalia" @if($conuntry == 'Somalia') selected @endif>Somalia</option>
                                            <option value="South Africa" @if($conuntry == 'South Africa') selected @endif>South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands" @if($conuntry == 'South Georgia and The South Sandwich Islands') selected @endif>South Georgia
                                                and The South Sandwich Islands
                                            </option>
                                            <option value="Spain" @if($conuntry == 'Spain') selected @endif>Spain</option>
                                            <option value="Sri Lanka" @if($conuntry == 'Sri Lanka') selected @endif>Sri Lanka</option>
                                            <option value="Sudan" @if($conuntry == 'Sudan') selected @endif>Sudan</option>
                                            <option value="Suriname" @if($conuntry == 'Suriname') selected @endif>Suriname</option>
                                            <option value="Svalbard and Jan Mayen" @if($conuntry == 'Svalbard and Jan Mayen') selected @endif>Svalbard and Jan Mayen</option>
                                            <option value="Swaziland" @if($conuntry == 'Swaziland') selected @endif>Swaziland</option>
                                            <option value="Sweden" @if($conuntry == 'Sweden') selected @endif>Sweden</option>
                                            <option value="Switzerland" @if($conuntry == 'Switzerland') selected @endif>Switzerland</option>
                                            <option value="Syrian Arab Republic" @if($conuntry == 'Syrian Arab Republic') selected @endif>Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China" @if($conuntry == 'Taiwan, Province of China') selected @endif>Taiwan, Province of China</option>
                                            <option value="Tajikistan" @if($conuntry == 'Tajikistan') selected @endif>Tajikistan</option>
                                            <option value="Tanzania, United Republic of" @if($conuntry == 'Tanzania, United Republic of') selected @endif>Tanzania, United Republic of
                                            </option>
                                            <option value="Thailand" @if($conuntry == 'Thailand') selected @endif>Thailand</option>
                                            <option value="Timor-leste" @if($conuntry == 'Timor-leste') selected @endif>Timor-leste</option>
                                            <option value="Togo" @if($conuntry == 'Togo') selected @endif>Togo</option>
                                            <option value="Tokelau" @if($conuntry == 'Tokelau') selected @endif>Tokelau</option>
                                            <option value="Tonga" @if($conuntry == 'Tonga') selected @endif>Tonga</option>
                                            <option value="Trinidad and Tobago" @if($conuntry == 'Trinidad and Tobago') selected @endif>Trinidad and Tobago</option>
                                            <option value="Tunisia" @if($conuntry == 'Tunisia') selected @endif>Tunisia</option>
                                            <option value="Turkey" @if($conuntry == 'Turkey') selected @endif>Turkey</option>
                                            <option value="Turkmenistan" @if($conuntry == 'Turkmenistan') selected @endif>Turkmenistan</option>
                                            <option value="Turks and Caicos Islands" @if($conuntry == 'Turks and Caicos Islands') selected @endif>Turks and Caicos Islands</option>
                                            <option value="Tuvalu" @if($conuntry == 'Tuvalu') selected @endif>Tuvalu</option>
                                            <option value="Uganda" @if($conuntry == 'Uganda') selected @endif>Uganda</option>
                                            <option value="Ukraine" @if($conuntry == 'Ukraine') selected @endif>Ukraine</option>
                                            <option value="United Arab Emirates" @if($conuntry == 'United Arab Emirates') selected @endif>United Arab Emirates</option>
                                            <option value="United Kingdom" @if($conuntry == 'United Kingdom') selected @endif>United Kingdom</option>
                                            <option value="United States" @if($conuntry == 'United States') selected @endif>United States</option>
                                            <option value="United States Minor Outlying Islands" @if($conuntry == 'United States Minor Outlying Islands') selected @endif>United States Minor
                                                Outlying Islands
                                            </option>
                                            <option value="Uruguay" @if($conuntry == 'Uruguay') selected @endif>Uruguay</option>
                                            <option value="Uzbekistan" @if($conuntry == 'Uzbekistan') selected @endif>Uzbekistan</option>
                                            <option value="Vanuatu" @if($conuntry == 'Vanuatu') selected @endif>Vanuatu</option>
                                            <option value="Venezuela" @if($conuntry == 'Venezuela') selected @endif>Venezuela</option>
                                            <option value="Viet Nam" @if($conuntry == 'Viet Nam') selected @endif>Viet Nam</option>
                                            <option value="Virgin Islands, British" @if($conuntry == 'Virgin Islands, British') selected @endif>Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S." @if($conuntry == 'Virgin Islands, U.S.') selected @endif>Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna" @if($conuntry == 'Wallis and Futuna') selected @endif>Wallis and Futuna</option>
                                            <option value="Western Sahara" @if($conuntry == 'Western Sahara') selected @endif>Western Sahara</option>
                                            <option value="Yemen" @if($conuntry == 'Yemen') selected @endif>Yemen</option>
                                            <option value="Zambia" @if($conuntry == 'Zambia') selected @endif>Zambia</option>
                                            <option value="Zimbabwe" @if($conuntry == 'Zimbabwe') selected @endif>Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(!empty($user->id))
                    <input type="hidden" name="id" value="{!! $user->id !!}">
                @endif

                <div class="form-group">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-default"><i
                                class="fa fa-refresh"></i>&nbsp;@lang('logs.cancle')</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;@lang('logs.save')
                        </button>
                    </div>
                </div>

            </form>

            <script>

                $(document).ready(function () {
                    $('#subdistrict1').change(function () {
                        $('#zipcode1').val($(this).find(':selected').data('zip'));
                    });
                    $('#subdistrict2').change(function () {
                        $('#zipcode2').val($(this).find(':selected').data('zip'));
                    });
                    $('#province1').change(function () {
                        $.ajax({
                            method: "GET",
                            url: "{{route('get_amphures')}}",
                            data: {
                                province: $("#province1").val(),
                            },
                            success: function (data) {
                                console.log(data);
                                data.forEach(function (element) {
                                    $('#district1').append(
                                        "<option value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                                });
                            }
                        });
                    });
                    $('#province2').change(function () {
                        $.ajax({
                            method: "GET",
                            url: "{{route('get_amphures')}}",
                            data: {
                                province: $("#province2").val(),
                            },
                            success: function (data) {
                                console.log(data);
                                data.forEach(function (element) {
                                    $('#district2').append(
                                        "<option value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                                });
                            }
                        });
                    });
                    $('#district1').change(function () {
                        $.ajax({
                            method: "GET",
                            url: "{{route('get_dis')}}",
                            data: {
                                district: $("#district1").val(),
                            },
                            success: function (data) {
                                console.log(data);
                                data.forEach(function (element) {
                                    $('#subdistrict1').append(
                                        "<option  data-zip='" + element.zip_code + "' value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                                });
                            }
                        });
                    });
                    $('#district2').change(function () {
                        $.ajax({
                            method: "GET",
                            url: "{{route('get_dis')}}",
                            data: {
                                district: $("#district2").val(),
                            },
                            success: function (data) {
                                console.log(data);
                                data.forEach(function (element) {
                                    $('#subdistrict2').append(
                                        "<option  data-zip='" + element.zip_code + "' value='" + element.name_th + "'>" + element.name_th + "</option>"
                                    )
                                });
                            }
                        });
                    });

                });


            </script>
