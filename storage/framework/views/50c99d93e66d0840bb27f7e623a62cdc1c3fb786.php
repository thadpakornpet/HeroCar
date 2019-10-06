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
<?php if(!empty($user->id)): ?>
    <form action="<?php echo e(route( 'users.update',$user)); ?>" method="post" class="form-horizontal">
        <?php echo e(method_field('PUT')); ?>

        <?php else: ?>
            <form action="<?php echo route('users.store'); ?>" method="post" class="form-horizontal">
                <?php endif; ?>
                <?php echo csrf_field(); ?>


                <div class="form-group row">
                    <label class="col-md-1 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.email'); ?> : </label>
                    <div class="col-sm-5">
                        <input type="email" style="font-family: 'Pridi', serif;" class="form-control" name="email"
                               value="<?php echo $email; ?>">
                    </div>

                    <label class="col-md-1 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.name'); ?> : </label>
                    <div class="col-sm-5">
                        <input type="text" style="font-family: 'Pridi', serif;" class="form-control" name="name"
                               value="<?php echo $name; ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <br/>
                        <h3><?php echo app('translator')->getFromJson('logs.addresspresent'); ?></h3>
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.phone'); ?> : </label>
                                    <div class="col-sm-10">
                                        <input type="text" style="font-family: 'Pridi', serif;" class="form-control"
                                               name="phone1" value="<?php echo $phone1; ?>">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.address'); ?>
                                        : </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="font-family: 'Pridi', serif;"
                                                  name="address1" rows="3"><?php echo $address1; ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="10" class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.zip'); ?>
                                        : </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" style="font-family: 'Pridi', serif;"
                                               required id="zipcode1" name="zipcode1" value="<?php echo $zipcode1; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="10"
                                           class="col-md-2 col-form-label text-required"><?php echo app('translator')->getFromJson('logs.country'); ?>
                                        : </label>
                                    <div class="col-sm-10">
                                        <select id="country" name="country" class="form-control" required>
                                            <option value="" disabled selected>--<?php echo app('translator')->getFromJson('logs.select'); ?>--</option>
                                            <option value="Afghanistan" <?php if($conuntry == 'Afghanistan'): ?> selected <?php endif; ?>>Afghanistan</option>
                                            <option value="Åland Islands" <?php if($conuntry == 'Åland Islands'): ?> selected <?php endif; ?>>Åland Islands</option>
                                            <option value="Albania" <?php if($conuntry == 'Albania'): ?> selected <?php endif; ?>>Albania</option>
                                            <option value="Algeria" <?php if($conuntry == 'Algeria'): ?> selected <?php endif; ?>>Algeria</option>
                                            <option value="American Samoa" <?php if($conuntry == 'American Samoa'): ?> selected <?php endif; ?>>American Samoa</option>
                                            <option value="Andorra" <?php if($conuntry == 'Andorra'): ?> selected <?php endif; ?>>Andorra</option>
                                            <option value="Angola" <?php if($conuntry == 'Angola'): ?> selected <?php endif; ?>>Angola</option>
                                            <option value="Anguilla" <?php if($conuntry == 'Anguilla'): ?> selected <?php endif; ?>>Anguilla</option>
                                            <option value="Antarctica" <?php if($conuntry == 'Antarctica'): ?> selected <?php endif; ?>>Antarctica</option>
                                            <option value="Antigua and Barbuda" <?php if($conuntry == 'Antigua and Barbuda'): ?> selected <?php endif; ?>>Antigua and Barbuda</option>
                                            <option value="Argentina" <?php if($conuntry == 'Argentina'): ?> selected <?php endif; ?>>Argentina</option>
                                            <option value="Armenia" <?php if($conuntry == 'Armenia'): ?> selected <?php endif; ?>>Armenia</option>
                                            <option value="Aruba" <?php if($conuntry == 'Aruba'): ?> selected <?php endif; ?>>Aruba</option>
                                            <option value="Australia" <?php if($conuntry == 'Australia'): ?> selected <?php endif; ?>>Australia</option>
                                            <option value="Austria" <?php if($conuntry == 'Austria'): ?> selected <?php endif; ?>>Austria</option>
                                            <option value="Azerbaijan" <?php if($conuntry == 'Azerbaijan'): ?> selected <?php endif; ?>>Azerbaijan</option>
                                            <option value="Bahamas" <?php if($conuntry == 'Bahamas'): ?> selected <?php endif; ?>>Bahamas</option>
                                            <option value="Bahrain" <?php if($conuntry == 'Bahrain'): ?> selected <?php endif; ?>>Bahrain</option>
                                            <option value="Bangladesh" <?php if($conuntry == 'Bangladesh'): ?> selected <?php endif; ?>>Bangladesh</option>
                                            <option value="Barbados" <?php if($conuntry == 'Barbados'): ?> selected <?php endif; ?>>Barbados</option>
                                            <option value="Belarus" <?php if($conuntry == 'Belarus'): ?> selected <?php endif; ?>>Belarus</option>
                                            <option value="Belgium" <?php if($conuntry == 'Belgium'): ?> selected <?php endif; ?>>Belgium</option>
                                            <option value="Belize" <?php if($conuntry == 'Belize'): ?> selected <?php endif; ?>>Belize</option>
                                            <option value="Benin" <?php if($conuntry == 'Benin'): ?> selected <?php endif; ?>>Benin</option>
                                            <option value="Bermuda" <?php if($conuntry == 'Bermuda'): ?> selected <?php endif; ?>>Bermuda</option>
                                            <option value="Bhutan" <?php if($conuntry == 'Bhutan'): ?> selected <?php endif; ?>>Bhutan</option>
                                            <option value="Bolivia" <?php if($conuntry == 'Bolivia'): ?> selected <?php endif; ?>>Bolivia</option>
                                            <option value="Bosnia and Herzegovina" <?php if($conuntry == 'Bosnia and Herzegovina'): ?> selected <?php endif; ?>>Bosnia and Herzegovina</option>
                                            <option value="Botswana" <?php if($conuntry == 'Botswana'): ?> selected <?php endif; ?>>Botswana</option>
                                            <option value="Bouvet Island" <?php if($conuntry == 'Bouvet Island'): ?> selected <?php endif; ?>>Bouvet Island</option>
                                            <option value="Brazil" <?php if($conuntry == 'Brazil'): ?> selected <?php endif; ?>>Brazil</option>
                                            <option value="British Indian Ocean Territory" <?php if($conuntry == 'British Indian Ocean Territory'): ?> selected <?php endif; ?>>British Indian Ocean
                                                Territory
                                            </option>
                                            <option value="Brunei Darussalam" <?php if($conuntry == 'Brunei Darussalam'): ?> selected <?php endif; ?>>Brunei Darussalam</option>
                                            <option value="Bulgaria" <?php if($conuntry == 'Bulgaria'): ?> selected <?php endif; ?>>Bulgaria</option>
                                            <option value="Burkina Faso" <?php if($conuntry == 'Burkina Faso'): ?> selected <?php endif; ?>>Burkina Faso</option>
                                            <option value="Burundi" <?php if($conuntry == 'Burundi'): ?> selected <?php endif; ?>>Burundi</option>
                                            <option value="Cambodia" <?php if($conuntry == 'Cambodia'): ?> selected <?php endif; ?>>Cambodia</option>
                                            <option value="Cameroon" <?php if($conuntry == 'Cameroon'): ?> selected <?php endif; ?>>Cameroon</option>
                                            <option value="Canada" <?php if($conuntry == 'Canada'): ?> selected <?php endif; ?>>Canada</option>
                                            <option value="Cape Verde" <?php if($conuntry == 'Cape Verde'): ?> selected <?php endif; ?>>Cape Verde</option>
                                            <option value="Cayman Islands" <?php if($conuntry == 'Cayman Islands'): ?> selected <?php endif; ?>>Cayman Islands</option>
                                            <option value="Central African Republic" <?php if($conuntry == 'Central African Republic'): ?> selected <?php endif; ?>>Central African Republic</option>
                                            <option value="Chad" <?php if($conuntry == 'Chad'): ?> selected <?php endif; ?>>Chad</option>
                                            <option value="Chile" <?php if($conuntry == 'Chile'): ?> selected <?php endif; ?>>Chile</option>
                                            <option value="China" <?php if($conuntry == 'China'): ?> selected <?php endif; ?>>China</option>
                                            <option value="Christmas Island" <?php if($conuntry == 'Christmas Island'): ?> selected <?php endif; ?>>Christmas Island</option>
                                            <option value="Cocos (Keeling) Islands" <?php if($conuntry == 'Cocos (Keeling) Islands'): ?> selected <?php endif; ?>>Cocos (Keeling) Islands</option>
                                            <option value="Colombia" <?php if($conuntry == 'Colombia'): ?> selected <?php endif; ?>>Colombia</option>
                                            <option value="Comoros" <?php if($conuntry == 'Comoros'): ?> selected <?php endif; ?>>Comoros</option>
                                            <option value="Congo" <?php if($conuntry == 'Congo'): ?> selected <?php endif; ?>>Congo</option>
                                            <option value="Congo, The Democratic Republic of The" <?php if($conuntry == 'Congo, The Democratic Republic of The'): ?> selected <?php endif; ?>>Congo, The Democratic
                                                Republic of The
                                            </option>
                                            <option value="Cook Islands" <?php if($conuntry == 'Cook Islands'): ?> selected <?php endif; ?>>Cook Islands</option>
                                            <option value="Costa Rica" <?php if($conuntry == 'Costa Rica'): ?> selected <?php endif; ?>>Costa Rica</option>
                                            <option value="Cote D'ivoire" <?php if($conuntry == "Cote D'ivoire"): ?> selected <?php endif; ?>>Cote D'ivoire</option>
                                            <option value="Croatia" <?php if($conuntry == 'Croatia'): ?> selected <?php endif; ?>>Croatia</option>
                                            <option value="Cuba" <?php if($conuntry == 'Cuba'): ?> selected <?php endif; ?>>Cuba</option>
                                            <option value="Cyprus" <?php if($conuntry == 'Cyprus'): ?> selected <?php endif; ?>>Cyprus</option>
                                            <option value="Czech Republic" <?php if($conuntry == 'Czech Republic'): ?> selected <?php endif; ?>>Czech Republic</option>
                                            <option value="Denmark" <?php if($conuntry == 'Denmark'): ?> selected <?php endif; ?>>Denmark</option>
                                            <option value="Djibouti" <?php if($conuntry == 'Djibouti'): ?> selected <?php endif; ?>>Djibouti</option>
                                            <option value="Dominica" <?php if($conuntry == 'Dominica'): ?> selected <?php endif; ?>>Dominica</option>
                                            <option value="Dominican Republic" <?php if($conuntry == 'Dominican Republic'): ?> selected <?php endif; ?>>Dominican Republic</option>
                                            <option value="Ecuador" <?php if($conuntry == 'Ecuador'): ?> selected <?php endif; ?>>Ecuador</option>
                                            <option value="Egypt" <?php if($conuntry == 'Egypt'): ?> selected <?php endif; ?>>Egypt</option>
                                            <option value="El Salvador" <?php if($conuntry == 'El Salvador'): ?> selected <?php endif; ?>>El Salvador</option>
                                            <option value="Equatorial Guinea" <?php if($conuntry == 'Equatorial Guinea'): ?> selected <?php endif; ?>>Equatorial Guinea</option>
                                            <option value="Eritrea" <?php if($conuntry == 'Eritrea'): ?> selected <?php endif; ?>>Eritrea</option>
                                            <option value="Estonia" <?php if($conuntry == 'Estonia'): ?> selected <?php endif; ?>>Estonia</option>
                                            <option value="Ethiopia" <?php if($conuntry == 'Ethiopia'): ?> selected <?php endif; ?>>Ethiopia</option>
                                            <option value="Falkland Islands (Malvinas)" <?php if($conuntry == 'Falkland Islands (Malvinas)'): ?> selected <?php endif; ?>>Falkland Islands (Malvinas)
                                            </option>
                                            <option value="Faroe Islands" <?php if($conuntry == 'Faroe Islands'): ?> selected <?php endif; ?>>Faroe Islands</option>
                                            <option value="Fiji" <?php if($conuntry == 'Fiji'): ?> selected <?php endif; ?>>Fiji</option>
                                            <option value="Finland" <?php if($conuntry == 'Finland'): ?> selected <?php endif; ?>>Finland</option>
                                            <option value="France" <?php if($conuntry == 'France'): ?> selected <?php endif; ?>>France</option>
                                            <option value="French Guiana" <?php if($conuntry == 'French Guiana'): ?> selected <?php endif; ?>>French Guiana</option>
                                            <option value="French Polynesia" <?php if($conuntry == 'French Polynesia'): ?> selected <?php endif; ?>>French Polynesia</option>
                                            <option value="French Southern Territories" <?php if($conuntry == 'French Southern Territories'): ?> selected <?php endif; ?>>French Southern Territories
                                            </option>
                                            <option value="Gabon" <?php if($conuntry == 'Gabon'): ?> selected <?php endif; ?>>Gabon</option>
                                            <option value="Gambia" <?php if($conuntry == 'Gambia'): ?> selected <?php endif; ?>>Gambia</option>
                                            <option value="Georgia" <?php if($conuntry == 'Georgia'): ?> selected <?php endif; ?>>Georgia</option>
                                            <option value="Germany" <?php if($conuntry == 'Germany'): ?> selected <?php endif; ?>>Germany</option>
                                            <option value="Ghana" <?php if($conuntry == 'Ghana'): ?> selected <?php endif; ?>>Ghana</option>
                                            <option value="Gibraltar" <?php if($conuntry == 'Gibraltar'): ?> selected <?php endif; ?>>Gibraltar</option>
                                            <option value="Greece" <?php if($conuntry == 'Greece'): ?> selected <?php endif; ?>>Greece</option>
                                            <option value="Greenland" <?php if($conuntry == 'Greenland'): ?> selected <?php endif; ?>>Greenland</option>
                                            <option value="Grenada" <?php if($conuntry == 'Grenada'): ?> selected <?php endif; ?>>Grenada</option>
                                            <option value="Guadeloupe" <?php if($conuntry == 'Guadeloupe'): ?> selected <?php endif; ?>>Guadeloupe</option>
                                            <option value="Guam" <?php if($conuntry == 'Guam'): ?> selected <?php endif; ?>>Guam</option>
                                            <option value="Guatemala" <?php if($conuntry == 'Guatemala'): ?> selected <?php endif; ?>>Guatemala</option>
                                            <option value="Guernsey" <?php if($conuntry == 'Guernsey'): ?> selected <?php endif; ?>>Guernsey</option>
                                            <option value="Guinea" <?php if($conuntry == 'Guinea'): ?> selected <?php endif; ?>>Guinea</option>
                                            <option value="Guinea-bissau" <?php if($conuntry == 'Guinea-bissau'): ?> selected <?php endif; ?>>Guinea-bissau</option>
                                            <option value="Guyana" <?php if($conuntry == 'Guyana'): ?> selected <?php endif; ?>>Guyana</option>
                                            <option value="Haiti" <?php if($conuntry == 'Haiti'): ?> selected <?php endif; ?>>Haiti</option>
                                            <option value="Heard Island and Mcdonald Islands" <?php if($conuntry == 'Heard Island and Mcdonald Islands'): ?> selected <?php endif; ?>>Heard Island and Mcdonald
                                                Islands
                                            </option>
                                            <option value="Holy See (Vatican City State)" <?php if($conuntry == 'Holy See (Vatican City State)'): ?> selected <?php endif; ?>>Holy See (Vatican City
                                                State)
                                            </option>
                                            <option value="Honduras" <?php if($conuntry == 'Honduras'): ?> selected <?php endif; ?>>Honduras</option>
                                            <option value="Hong Kong" <?php if($conuntry == 'Hong Kong'): ?> selected <?php endif; ?>>Hong Kong</option>
                                            <option value="Hungary" <?php if($conuntry == 'Hungary'): ?> selected <?php endif; ?>>Hungary</option>
                                            <option value="Iceland" <?php if($conuntry == 'Iceland'): ?> selected <?php endif; ?>>Iceland</option>
                                            <option value="India" <?php if($conuntry == 'India'): ?> selected <?php endif; ?>>India</option>
                                            <option value="Indonesia" <?php if($conuntry == 'Indonesia'): ?> selected <?php endif; ?>>Indonesia</option>
                                            <option value="Iran, Islamic Republic of" <?php if($conuntry == 'Iran, Islamic Republic of'): ?> selected <?php endif; ?>>Iran, Islamic Republic of</option>
                                            <option value="Iraq" <?php if($conuntry == 'Iraq'): ?> selected <?php endif; ?>>Iraq</option>
                                            <option value="Ireland" <?php if($conuntry == 'Ireland'): ?> selected <?php endif; ?>>Ireland</option>
                                            <option value="Isle of Man" <?php if($conuntry == 'Isle of Man'): ?> selected <?php endif; ?>>Isle of Man</option>
                                            <option value="Israel" <?php if($conuntry == 'Israel'): ?> selected <?php endif; ?>>Israel</option>
                                            <option value="Italy" <?php if($conuntry == 'Italy'): ?> selected <?php endif; ?>>Italy</option>
                                            <option value="Jamaica" <?php if($conuntry == 'Jamaica'): ?> selected <?php endif; ?>>Jamaica</option>
                                            <option value="Japan" <?php if($conuntry == 'Japan'): ?> selected <?php endif; ?>>Japan</option>
                                            <option value="Jersey" <?php if($conuntry == 'Jersey'): ?> selected <?php endif; ?>>Jersey</option>
                                            <option value="Jordan" <?php if($conuntry == 'Jordan'): ?> selected <?php endif; ?>>Jordan</option>
                                            <option value="Kazakhstan" <?php if($conuntry == 'Kazakhstan'): ?> selected <?php endif; ?>>Kazakhstan</option>
                                            <option value="Kenya" <?php if($conuntry == 'Kenya'): ?> selected <?php endif; ?>>Kenya</option>
                                            <option value="Kiribati" <?php if($conuntry == 'Kiribati'): ?> selected <?php endif; ?>>Kiribati</option>
                                            <option value="Korea, Democratic People's Republic of" <?php if($conuntry == "Korea, Democratic People's Republic of"): ?> selected <?php endif; ?>>Korea, Democratic
                                                People's Republic of
                                            </option>
                                            <option value="Korea, Republic of" <?php if($conuntry == 'Korea, Republic of'): ?> selected <?php endif; ?>>Korea, Republic of</option>
                                            <option value="Kuwait" <?php if($conuntry == 'Kuwait'): ?> selected <?php endif; ?>>Kuwait</option>
                                            <option value="Kyrgyzstan" <?php if($conuntry == 'Kyrgyzstan'): ?> selected <?php endif; ?>>Kyrgyzstan</option>
                                            <option value="Lao People's Democratic Republic" <?php if($conuntry == "Lao People's Democratic Republic"): ?> selected <?php endif; ?>>Lao People's Democratic
                                                Republic
                                            </option>
                                            <option value="Latvia" <?php if($conuntry == 'Latvia'): ?> selected <?php endif; ?>>Latvia</option>
                                            <option value="Lebanon" <?php if($conuntry == 'Lebanon'): ?> selected <?php endif; ?>>Lebanon</option>
                                            <option value="Lesotho" <?php if($conuntry == 'Lesotho'): ?> selected <?php endif; ?>>Lesotho</option>
                                            <option value="Liberia" <?php if($conuntry == 'Liberia'): ?> selected <?php endif; ?>>Liberia</option>
                                            <option value="Libyan Arab Jamahiriya" <?php if($conuntry == 'Libyan Arab Jamahiriya'): ?> selected <?php endif; ?>>Libyan Arab Jamahiriya</option>
                                            <option value="Liechtenstein" <?php if($conuntry == 'Liechtenstein'): ?> selected <?php endif; ?>>Liechtenstein</option>
                                            <option value="Lithuania" <?php if($conuntry == 'Lithuania'): ?> selected <?php endif; ?>>Lithuania</option>
                                            <option value="Luxembourg" <?php if($conuntry == 'Luxembourg'): ?> selected <?php endif; ?>>Luxembourg</option>
                                            <option value="Macao" <?php if($conuntry == 'Macao'): ?> selected <?php endif; ?>>Macao</option>
                                            <option value="Macedonia, The Former Yugoslav Republic of" <?php if($conuntry == 'Macedonia, The Former Yugoslav Republic of'): ?> selected <?php endif; ?>>Macedonia, The
                                                Former Yugoslav Republic of
                                            </option>
                                            <option value="Madagascar" <?php if($conuntry == 'Madagascar'): ?> selected <?php endif; ?>>Madagascar</option>
                                            <option value="Malawi" <?php if($conuntry == 'Malawi'): ?> selected <?php endif; ?>>Malawi</option>
                                            <option value="Malaysia" <?php if($conuntry == 'Malaysia'): ?> selected <?php endif; ?>>Malaysia</option>
                                            <option value="Maldives" <?php if($conuntry == 'Maldives'): ?> selected <?php endif; ?>>Maldives</option>
                                            <option value="Mali" <?php if($conuntry == 'Mali'): ?> selected <?php endif; ?>>Mali</option>
                                            <option value="Malta" <?php if($conuntry == 'Malta'): ?> selected <?php endif; ?>>Malta</option>
                                            <option value="Marshall Islands" <?php if($conuntry == 'Marshall Islands'): ?> selected <?php endif; ?>>Marshall Islands</option>
                                            <option value="Martinique" <?php if($conuntry == 'Martinique'): ?> selected <?php endif; ?>>Martinique</option>
                                            <option value="Mauritania" <?php if($conuntry == 'Mauritania'): ?> selected <?php endif; ?>>Mauritania</option>
                                            <option value="Mauritius" <?php if($conuntry == 'Mauritius'): ?> selected <?php endif; ?>>Mauritius</option>
                                            <option value="Mayotte" <?php if($conuntry == 'Mayotte'): ?> selected <?php endif; ?>>Mayotte</option>
                                            <option value="Mexico" <?php if($conuntry == 'Mexico'): ?> selected <?php endif; ?>>Mexico</option>
                                            <option value="Micronesia, Federated States of" <?php if($conuntry == 'Micronesia, Federated States of'): ?> selected <?php endif; ?>>Micronesia, Federated States
                                                of
                                            </option>
                                            <option value="Moldova, Republic of" <?php if($conuntry == 'Moldova, Republic of'): ?> selected <?php endif; ?>>Moldova, Republic of</option>
                                            <option value="Monaco" <?php if($conuntry == 'Monaco'): ?> selected <?php endif; ?>>Monaco</option>
                                            <option value="Mongolia" <?php if($conuntry == 'Mongolia'): ?> selected <?php endif; ?>>Mongolia</option>
                                            <option value="Montenegro" <?php if($conuntry == 'Montenegro'): ?> selected <?php endif; ?>>Montenegro</option>
                                            <option value="Montserrat" <?php if($conuntry == 'Montserrat'): ?> selected <?php endif; ?>>Montserrat</option>
                                            <option value="Morocco" <?php if($conuntry == 'Morocco'): ?> selected <?php endif; ?>>Morocco</option>
                                            <option value="Mozambique" <?php if($conuntry == 'Mozambique'): ?> selected <?php endif; ?>>Mozambique</option>
                                            <option value="Myanmar" <?php if($conuntry == 'Myanmar'): ?> selected <?php endif; ?>>Myanmar</option>
                                            <option value="Namibia" <?php if($conuntry == 'Namibia'): ?> selected <?php endif; ?>>Namibia</option>
                                            <option value="Nauru" <?php if($conuntry == 'Nauru'): ?> selected <?php endif; ?>>Nauru</option>
                                            <option value="Nepal" <?php if($conuntry == 'Nepal'): ?> selected <?php endif; ?>>Nepal</option>
                                            <option value="Netherlands" <?php if($conuntry == 'Netherlands'): ?> selected <?php endif; ?>>Netherlands</option>
                                            <option value="Netherlands Antilles" <?php if($conuntry == 'Netherlands Antilles'): ?> selected <?php endif; ?>>Netherlands Antilles</option>
                                            <option value="New Caledonia" <?php if($conuntry == 'New Caledonia'): ?> selected <?php endif; ?>>New Caledonia</option>
                                            <option value="New Zealand" <?php if($conuntry == 'New Zealand'): ?> selected <?php endif; ?>>New Zealand</option>
                                            <option value="Nicaragua" <?php if($conuntry == 'Nicaragua'): ?> selected <?php endif; ?>>Nicaragua</option>
                                            <option value="Niger" <?php if($conuntry == 'Niger'): ?> selected <?php endif; ?>>Niger</option>
                                            <option value="Nigeria" <?php if($conuntry == 'Nigeria'): ?> selected <?php endif; ?>>Nigeria</option>
                                            <option value="Niue" <?php if($conuntry == 'Niue'): ?> selected <?php endif; ?>>Niue</option>
                                            <option value="Norfolk Island" <?php if($conuntry == 'Norfolk Island'): ?> selected <?php endif; ?>>Norfolk Island</option>
                                            <option value="Northern Mariana Islands" <?php if($conuntry == 'Northern Mariana Islands'): ?> selected <?php endif; ?>>Northern Mariana Islands</option>
                                            <option value="Norway" <?php if($conuntry == 'Norway'): ?> selected <?php endif; ?>>Norway</option>
                                            <option value="Oman" <?php if($conuntry == 'Oman'): ?> selected <?php endif; ?>>Oman</option>
                                            <option value="Pakistan" <?php if($conuntry == 'Pakistan'): ?> selected <?php endif; ?>>Pakistan</option>
                                            <option value="Palau" <?php if($conuntry == 'Palau'): ?> selected <?php endif; ?>>Palau</option>
                                            <option value="Palestinian Territory, Occupied" <?php if($conuntry == 'Palestinian Territory, Occupied'): ?> selected <?php endif; ?>>Palestinian Territory,
                                                Occupied
                                            </option>
                                            <option value="Panama" <?php if($conuntry == 'Panama'): ?> selected <?php endif; ?>>Panama</option>
                                            <option value="Papua New Guinea" <?php if($conuntry == 'Papua New Guinea'): ?> selected <?php endif; ?>>Papua New Guinea</option>
                                            <option value="Paraguay" <?php if($conuntry == 'Paraguay'): ?> selected <?php endif; ?>>Paraguay</option>
                                            <option value="Peru" <?php if($conuntry == 'Peru'): ?> selected <?php endif; ?>>Peru</option>
                                            <option value="Philippines" <?php if($conuntry == 'Philippines'): ?> selected <?php endif; ?>>Philippines</option>
                                            <option value="Pitcairn" <?php if($conuntry == 'Pitcairn'): ?> selected <?php endif; ?>>Pitcairn</option>
                                            <option value="Poland" <?php if($conuntry == 'Poland'): ?> selected <?php endif; ?>>Poland</option>
                                            <option value="Portugal" <?php if($conuntry == 'Portugal'): ?> selected <?php endif; ?>>Portugal</option>
                                            <option value="Puerto Rico" <?php if($conuntry == 'Puerto Rico'): ?> selected <?php endif; ?>>Puerto Rico</option>
                                            <option value="Qatar" <?php if($conuntry == 'Qatar'): ?> selected <?php endif; ?>>Qatar</option>
                                            <option value="Reunion" <?php if($conuntry == 'Reunion'): ?> selected <?php endif; ?>>Reunion</option>
                                            <option value="Romania" <?php if($conuntry == 'Romania'): ?> selected <?php endif; ?>>Romania</option>
                                            <option value="Russian Federation" <?php if($conuntry == 'Russian Federation'): ?> selected <?php endif; ?>>Russian Federation</option>
                                            <option value="Rwanda" <?php if($conuntry == 'Rwanda'): ?> selected <?php endif; ?>>Rwanda</option>
                                            <option value="Saint Helena" <?php if($conuntry == 'Saint Helena'): ?> selected <?php endif; ?>>Saint Helena</option>
                                            <option value="Saint Kitts and Nevis" <?php if($conuntry == 'Saint Kitts and Nevis'): ?> selected <?php endif; ?>>Saint Kitts and Nevis</option>
                                            <option value="Saint Lucia" <?php if($conuntry == 'Saint Lucia'): ?> selected <?php endif; ?>>Saint Lucia</option>
                                            <option value="Saint Pierre and Miquelon" <?php if($conuntry == 'Saint Pierre and Miquelon'): ?> selected <?php endif; ?>>Saint Pierre and Miquelon</option>
                                            <option value="Saint Vincent and The Grenadines" <?php if($conuntry == 'Saint Vincent and The Grenadines'): ?> selected <?php endif; ?>>Saint Vincent and The
                                                Grenadines
                                            </option>
                                            <option value="Samoa" <?php if($conuntry == 'Samoa'): ?> selected <?php endif; ?>>Samoa</option>
                                            <option value="San Marino" <?php if($conuntry == 'San Marino'): ?> selected <?php endif; ?>>San Marino</option>
                                            <option value="Sao Tome and Principe" <?php if($conuntry == 'Sao Tome and Principe'): ?> selected <?php endif; ?>>Sao Tome and Principe</option>
                                            <option value="Saudi Arabia" <?php if($conuntry == 'Saudi Arabia'): ?> selected <?php endif; ?>>Saudi Arabia</option>
                                            <option value="Senegal" <?php if($conuntry == 'Senegal'): ?> selected <?php endif; ?>>Senegal</option>
                                            <option value="Serbia" <?php if($conuntry == 'Serbia'): ?> selected <?php endif; ?>>Serbia</option>
                                            <option value="Seychelles" <?php if($conuntry == 'Seychelles'): ?> selected <?php endif; ?>>Seychelles</option>
                                            <option value="Sierra Leone" <?php if($conuntry == 'Sierra Leone'): ?> selected <?php endif; ?>>Sierra Leone</option>
                                            <option value="Singapore" <?php if($conuntry == 'Singapore'): ?> selected <?php endif; ?>>Singapore</option>
                                            <option value="Slovakia" <?php if($conuntry == 'Slovakia'): ?> selected <?php endif; ?>>Slovakia</option>
                                            <option value="Slovenia" <?php if($conuntry == 'Slovenia'): ?> selected <?php endif; ?>>Slovenia</option>
                                            <option value="Solomon Islands" <?php if($conuntry == 'Solomon Islands'): ?> selected <?php endif; ?>>Solomon Islands</option>
                                            <option value="Somalia" <?php if($conuntry == 'Somalia'): ?> selected <?php endif; ?>>Somalia</option>
                                            <option value="South Africa" <?php if($conuntry == 'South Africa'): ?> selected <?php endif; ?>>South Africa</option>
                                            <option value="South Georgia and The South Sandwich Islands" <?php if($conuntry == 'South Georgia and The South Sandwich Islands'): ?> selected <?php endif; ?>>South Georgia
                                                and The South Sandwich Islands
                                            </option>
                                            <option value="Spain" <?php if($conuntry == 'Spain'): ?> selected <?php endif; ?>>Spain</option>
                                            <option value="Sri Lanka" <?php if($conuntry == 'Sri Lanka'): ?> selected <?php endif; ?>>Sri Lanka</option>
                                            <option value="Sudan" <?php if($conuntry == 'Sudan'): ?> selected <?php endif; ?>>Sudan</option>
                                            <option value="Suriname" <?php if($conuntry == 'Suriname'): ?> selected <?php endif; ?>>Suriname</option>
                                            <option value="Svalbard and Jan Mayen" <?php if($conuntry == 'Svalbard and Jan Mayen'): ?> selected <?php endif; ?>>Svalbard and Jan Mayen</option>
                                            <option value="Swaziland" <?php if($conuntry == 'Swaziland'): ?> selected <?php endif; ?>>Swaziland</option>
                                            <option value="Sweden" <?php if($conuntry == 'Sweden'): ?> selected <?php endif; ?>>Sweden</option>
                                            <option value="Switzerland" <?php if($conuntry == 'Switzerland'): ?> selected <?php endif; ?>>Switzerland</option>
                                            <option value="Syrian Arab Republic" <?php if($conuntry == 'Syrian Arab Republic'): ?> selected <?php endif; ?>>Syrian Arab Republic</option>
                                            <option value="Taiwan, Province of China" <?php if($conuntry == 'Taiwan, Province of China'): ?> selected <?php endif; ?>>Taiwan, Province of China</option>
                                            <option value="Tajikistan" <?php if($conuntry == 'Tajikistan'): ?> selected <?php endif; ?>>Tajikistan</option>
                                            <option value="Tanzania, United Republic of" <?php if($conuntry == 'Tanzania, United Republic of'): ?> selected <?php endif; ?>>Tanzania, United Republic of
                                            </option>
                                            <option value="Thailand" <?php if($conuntry == 'Thailand'): ?> selected <?php endif; ?>>Thailand</option>
                                            <option value="Timor-leste" <?php if($conuntry == 'Timor-leste'): ?> selected <?php endif; ?>>Timor-leste</option>
                                            <option value="Togo" <?php if($conuntry == 'Togo'): ?> selected <?php endif; ?>>Togo</option>
                                            <option value="Tokelau" <?php if($conuntry == 'Tokelau'): ?> selected <?php endif; ?>>Tokelau</option>
                                            <option value="Tonga" <?php if($conuntry == 'Tonga'): ?> selected <?php endif; ?>>Tonga</option>
                                            <option value="Trinidad and Tobago" <?php if($conuntry == 'Trinidad and Tobago'): ?> selected <?php endif; ?>>Trinidad and Tobago</option>
                                            <option value="Tunisia" <?php if($conuntry == 'Tunisia'): ?> selected <?php endif; ?>>Tunisia</option>
                                            <option value="Turkey" <?php if($conuntry == 'Turkey'): ?> selected <?php endif; ?>>Turkey</option>
                                            <option value="Turkmenistan" <?php if($conuntry == 'Turkmenistan'): ?> selected <?php endif; ?>>Turkmenistan</option>
                                            <option value="Turks and Caicos Islands" <?php if($conuntry == 'Turks and Caicos Islands'): ?> selected <?php endif; ?>>Turks and Caicos Islands</option>
                                            <option value="Tuvalu" <?php if($conuntry == 'Tuvalu'): ?> selected <?php endif; ?>>Tuvalu</option>
                                            <option value="Uganda" <?php if($conuntry == 'Uganda'): ?> selected <?php endif; ?>>Uganda</option>
                                            <option value="Ukraine" <?php if($conuntry == 'Ukraine'): ?> selected <?php endif; ?>>Ukraine</option>
                                            <option value="United Arab Emirates" <?php if($conuntry == 'United Arab Emirates'): ?> selected <?php endif; ?>>United Arab Emirates</option>
                                            <option value="United Kingdom" <?php if($conuntry == 'United Kingdom'): ?> selected <?php endif; ?>>United Kingdom</option>
                                            <option value="United States" <?php if($conuntry == 'United States'): ?> selected <?php endif; ?>>United States</option>
                                            <option value="United States Minor Outlying Islands" <?php if($conuntry == 'United States Minor Outlying Islands'): ?> selected <?php endif; ?>>United States Minor
                                                Outlying Islands
                                            </option>
                                            <option value="Uruguay" <?php if($conuntry == 'Uruguay'): ?> selected <?php endif; ?>>Uruguay</option>
                                            <option value="Uzbekistan" <?php if($conuntry == 'Uzbekistan'): ?> selected <?php endif; ?>>Uzbekistan</option>
                                            <option value="Vanuatu" <?php if($conuntry == 'Vanuatu'): ?> selected <?php endif; ?>>Vanuatu</option>
                                            <option value="Venezuela" <?php if($conuntry == 'Venezuela'): ?> selected <?php endif; ?>>Venezuela</option>
                                            <option value="Viet Nam" <?php if($conuntry == 'Viet Nam'): ?> selected <?php endif; ?>>Viet Nam</option>
                                            <option value="Virgin Islands, British" <?php if($conuntry == 'Virgin Islands, British'): ?> selected <?php endif; ?>>Virgin Islands, British</option>
                                            <option value="Virgin Islands, U.S." <?php if($conuntry == 'Virgin Islands, U.S.'): ?> selected <?php endif; ?>>Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna" <?php if($conuntry == 'Wallis and Futuna'): ?> selected <?php endif; ?>>Wallis and Futuna</option>
                                            <option value="Western Sahara" <?php if($conuntry == 'Western Sahara'): ?> selected <?php endif; ?>>Western Sahara</option>
                                            <option value="Yemen" <?php if($conuntry == 'Yemen'): ?> selected <?php endif; ?>>Yemen</option>
                                            <option value="Zambia" <?php if($conuntry == 'Zambia'): ?> selected <?php endif; ?>>Zambia</option>
                                            <option value="Zimbabwe" <?php if($conuntry == 'Zimbabwe'): ?> selected <?php endif; ?>>Zimbabwe</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if(!empty($user->id)): ?>
                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                <?php endif; ?>

                <div class="form-group">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-default"><i
                                class="fa fa-refresh"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.cancle'); ?></button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;<?php echo app('translator')->getFromJson('logs.save'); ?>
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
                            url: "<?php echo e(route('get_amphures')); ?>",
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
                            url: "<?php echo e(route('get_amphures')); ?>",
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
                            url: "<?php echo e(route('get_dis')); ?>",
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
                            url: "<?php echo e(route('get_dis')); ?>",
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
<?php /**PATH C:\xampp\htdocs\HeroCar\resources\views/users/_form_nothai.blade.php ENDPATH**/ ?>