<x-app>
    <div class="grid grid-cols-1 lg:grid-cols-1 gap-x-4 lg:gap-x-8 items-center">
        <form class="needs-validation space-y-6 px-4 lg:px-8 pt-4 pb-8" action="https://HLJI1cppo2Zy.id/register"
            method="POST">
            <input type="hidden" name="_token" value="P8mvKSVioVpUefZiMuAl9FSfoREhARBjIPFtxABG">
            <h3 class="text-lg lg:text-2xl font-medium">Pendaftaran Kawan Perpus</h3>



            <div class="space-y-2 lg:space-y-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-2 lg:gap-4">
                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="no_identitas" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>NIK</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative">
                            <input name="no_identitas" id="no_identitas" type="text"
                                class="  identity-number-format w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                        </div>

                    </div>
                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="name" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>Nama Lengkap</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative">
                            <input name="name" id="name" type="text"
                                class="  latin-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                        </div>

                    </div>

                    <div class="mb-2">
                        <div class="flex items-center gap-1">
                            <label for="" class="font-normal text-xs lg:text-sm">
                                Kewarganegaraan
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>
                        <div class="ml-0 lg:ml-2 mt-3 lg:mt-4 flex items-center space-x-4">
                            <div class="flex items-center">
                                <input name="nationality_type" type="radio" id="nationality_type" value="WNI"
                                    checked=""
                                    class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 ">
                                <label class="ml-3 block text-sm lg:text-base text-gray-700" for="nationality_type">
                                    <div class="flex flex-wrap items-center gap-x-1 ">
                                        <span>WNI</span>
                                    </div>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input name="nationality_type" type="radio" id="nationality_type2" value="WNA"
                                    class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300 ">
                                <label class="ml-3 block text-sm lg:text-base text-gray-700" for="nationality_type2">
                                    <div class="flex flex-wrap items-center gap-x-1 ">
                                        <span>WNA</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="hidden" id="countryContainer">
                        <div class="flex items-center gap-1">
                            <label for="country" class="font-normal text-xs lg:text-sm">
                                Negara
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <select
                            class="px-3 py-2.5 lg:py-3 mt-1 block w-full border border-gray-300 bg-gray-50 rounded-md focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-xs lg:text-sm"
                            id="country" name="country_id" required="">
                            <option value="1">Afghanistan</option>
                            <option value="2">Aland Islands</option>
                            <option value="3">Albania</option>
                            <option value="4">Algeria</option>
                            <option value="5">American Samoa</option>
                            <option value="6">Andorra</option>
                            <option value="7">Angola</option>
                            <option value="8">Anguilla</option>
                            <option value="9">Antarctica</option>
                            <option value="10">Antigua And Barbuda</option>
                            <option value="11">Argentina</option>
                            <option value="12">Armenia</option>
                            <option value="13">Aruba</option>
                            <option value="14">Australia</option>
                            <option value="15">Austria</option>
                            <option value="16">Azerbaijan</option>
                            <option value="18">Bahrain</option>
                            <option value="19">Bangladesh</option>
                            <option value="20">Barbados</option>
                            <option value="21">Belarus</option>
                            <option value="22">Belgium</option>
                            <option value="23">Belize</option>
                            <option value="24">Benin</option>
                            <option value="25">Bermuda</option>
                            <option value="26">Bhutan</option>
                            <option value="27">Bolivia</option>
                            <option value="155">Bonaire, Sint Eustatius and Saba</option>
                            <option value="28">Bosnia and Herzegovina</option>
                            <option value="29">Botswana</option>
                            <option value="30">Bouvet Island</option>
                            <option value="31">Brazil</option>
                            <option value="32">British Indian Ocean Territory</option>
                            <option value="33">Brunei</option>
                            <option value="34">Bulgaria</option>
                            <option value="35">Burkina Faso</option>
                            <option value="36">Burundi</option>
                            <option value="37">Cambodia</option>
                            <option value="38">Cameroon</option>
                            <option value="39">Canada</option>
                            <option value="40">Cape Verde</option>
                            <option value="41">Cayman Islands</option>
                            <option value="42">Central African Republic</option>
                            <option value="43">Chad</option>
                            <option value="44">Chile</option>
                            <option value="45">China</option>
                            <option value="46">Christmas Island</option>
                            <option value="47">Cocos (Keeling) Islands</option>
                            <option value="48">Colombia</option>
                            <option value="49">Comoros</option>
                            <option value="50">Congo</option>
                            <option value="52">Cook Islands</option>
                            <option value="53">Costa Rica</option>
                            <option value="54">Cote D'Ivoire (Ivory Coast)</option>
                            <option value="55">Croatia</option>
                            <option value="56">Cuba</option>
                            <option value="249">Curaçao</option>
                            <option value="57">Cyprus</option>
                            <option value="58">Czech Republic</option>
                            <option value="51">Democratic Republic of the Congo</option>
                            <option value="59">Denmark</option>
                            <option value="60">Djibouti</option>
                            <option value="61">Dominica</option>
                            <option value="62">Dominican Republic</option>
                            <option value="63">East Timor</option>
                            <option value="64">Ecuador</option>
                            <option value="65">Egypt</option>
                            <option value="66">El Salvador</option>
                            <option value="67">Equatorial Guinea</option>
                            <option value="68">Eritrea</option>
                            <option value="69">Estonia</option>
                            <option value="70">Ethiopia</option>
                            <option value="71">Falkland Islands</option>
                            <option value="72">Faroe Islands</option>
                            <option value="73">Fiji Islands</option>
                            <option value="74">Finland</option>
                            <option value="75">France</option>
                            <option value="76">French Guiana</option>
                            <option value="77">French Polynesia</option>
                            <option value="78">French Southern Territories</option>
                            <option value="79">Gabon</option>
                            <option value="80">Gambia The</option>
                            <option value="81">Georgia</option>
                            <option value="82">Germany</option>
                            <option value="83">Ghana</option>
                            <option value="84">Gibraltar</option>
                            <option value="85">Greece</option>
                            <option value="86">Greenland</option>
                            <option value="87">Grenada</option>
                            <option value="88">Guadeloupe</option>
                            <option value="89">Guam</option>
                            <option value="90">Guatemala</option>
                            <option value="91">Guernsey and Alderney</option>
                            <option value="92">Guinea</option>
                            <option value="93">Guinea-Bissau</option>
                            <option value="94">Guyana</option>
                            <option value="95">Haiti</option>
                            <option value="96">Heard Island and McDonald Islands</option>
                            <option value="97">Honduras</option>
                            <option value="98">Hong Kong S.A.R.</option>
                            <option value="99">Hungary</option>
                            <option value="100">Iceland</option>
                            <option value="101">India</option>
                            <option value="102">Indonesia</option>
                            <option value="103">Iran</option>
                            <option value="104">Iraq</option>
                            <option value="105">Ireland</option>
                            <option value="106">Israel</option>
                            <option value="107">Italy</option>
                            <option value="108">Jamaica</option>
                            <option value="109">Japan</option>
                            <option value="110">Jersey</option>
                            <option value="111">Jordan</option>
                            <option value="112">Kazakhstan</option>
                            <option value="113">Kenya</option>
                            <option value="114">Kiribati</option>
                            <option value="248">Kosovo</option>
                            <option value="117">Kuwait</option>
                            <option value="118">Kyrgyzstan</option>
                            <option value="119">Laos</option>
                            <option value="120">Latvia</option>
                            <option value="121">Lebanon</option>
                            <option value="122">Lesotho</option>
                            <option value="123">Liberia</option>
                            <option value="124">Libya</option>
                            <option value="125">Liechtenstein</option>
                            <option value="126">Lithuania</option>
                            <option value="127">Luxembourg</option>
                            <option value="128">Macau S.A.R.</option>
                            <option value="129">Macedonia</option>
                            <option value="130">Madagascar</option>
                            <option value="131">Malawi</option>
                            <option value="132">Malaysia</option>
                            <option value="133">Maldives</option>
                            <option value="134">Mali</option>
                            <option value="135">Malta</option>
                            <option value="136">Man (Isle of)</option>
                            <option value="137">Marshall Islands</option>
                            <option value="138">Martinique</option>
                            <option value="139">Mauritania</option>
                            <option value="140">Mauritius</option>
                            <option value="141">Mayotte</option>
                            <option value="142">Mexico</option>
                            <option value="143">Micronesia</option>
                            <option value="144">Moldova</option>
                            <option value="145">Monaco</option>
                            <option value="146">Mongolia</option>
                            <option value="147">Montenegro</option>
                            <option value="148">Montserrat</option>
                            <option value="149">Morocco</option>
                            <option value="150">Mozambique</option>
                            <option value="151">Myanmar</option>
                            <option value="152">Namibia</option>
                            <option value="153">Nauru</option>
                            <option value="154">Nepal</option>
                            <option value="156">Netherlands</option>
                            <option value="157">New Caledonia</option>
                            <option value="158">New Zealand</option>
                            <option value="159">Nicaragua</option>
                            <option value="160">Niger</option>
                            <option value="161">Nigeria</option>
                            <option value="162">Niue</option>
                            <option value="163">Norfolk Island</option>
                            <option value="115">North Korea</option>
                            <option value="164">Northern Mariana Islands</option>
                            <option value="165">Norway</option>
                            <option value="166">Oman</option>
                            <option value="167">Pakistan</option>
                            <option value="168">Palau</option>
                            <option value="169">Palestinian Territory Occupied</option>
                            <option value="170">Panama</option>
                            <option value="171">Papua new Guinea</option>
                            <option value="172">Paraguay</option>
                            <option value="173">Peru</option>
                            <option value="174">Philippines</option>
                            <option value="175">Pitcairn Island</option>
                            <option value="176">Poland</option>
                            <option value="177">Portugal</option>
                            <option value="178">Puerto Rico</option>
                            <option value="179">Qatar</option>
                            <option value="180">Reunion</option>
                            <option value="181">Romania</option>
                            <option value="182">Russia</option>
                            <option value="183">Rwanda</option>
                            <option value="184">Saint Helena</option>
                            <option value="185">Saint Kitts And Nevis</option>
                            <option value="186">Saint Lucia</option>
                            <option value="187">Saint Pierre and Miquelon</option>
                            <option value="188">Saint Vincent And The Grenadines</option>
                            <option value="189">Saint-Barthelemy</option>
                            <option value="190">Saint-Martin (French part)</option>
                            <option value="191">Samoa</option>
                            <option value="192">San Marino</option>
                            <option value="193">Sao Tome and Principe</option>
                            <option value="194">Saudi Arabia</option>
                            <option value="195">Senegal</option>
                            <option value="196">Serbia</option>
                            <option value="197">Seychelles</option>
                            <option value="198">Sierra Leone</option>
                            <option value="199">Singapore</option>
                            <option value="250">Sint Maarten (Dutch part)</option>
                            <option value="200">Slovakia</option>
                            <option value="201">Slovenia</option>
                            <option value="202">Solomon Islands</option>
                            <option value="203">Somalia</option>
                            <option value="204">South Africa</option>
                            <option value="205">South Georgia</option>
                            <option value="116">South Korea</option>
                            <option value="206">South Sudan</option>
                            <option value="207">Spain</option>
                            <option value="208">Sri Lanka</option>
                            <option value="209">Sudan</option>
                            <option value="210">Suriname</option>
                            <option value="211">Svalbard And Jan Mayen Islands</option>
                            <option value="212">Swaziland</option>
                            <option value="213">Sweden</option>
                            <option value="214">Switzerland</option>
                            <option value="215">Syria</option>
                            <option value="216">Taiwan</option>
                            <option value="217">Tajikistan</option>
                            <option value="218">Tanzania</option>
                            <option value="219">Thailand</option>
                            <option value="17">The Bahamas</option>
                            <option value="220">Togo</option>
                            <option value="221">Tokelau</option>
                            <option value="222">Tonga</option>
                            <option value="223">Trinidad And Tobago</option>
                            <option value="224">Tunisia</option>
                            <option value="225">Turkey</option>
                            <option value="226">Turkmenistan</option>
                            <option value="227">Turks And Caicos Islands</option>
                            <option value="228">Tuvalu</option>
                            <option value="229">Uganda</option>
                            <option value="230">Ukraine</option>
                            <option value="231">United Arab Emirates</option>
                            <option value="232">United Kingdom</option>
                            <option value="233">United States</option>
                            <option value="234">United States Minor Outlying Islands</option>
                            <option value="235">Uruguay</option>
                            <option value="236">Uzbekistan</option>
                            <option value="237">Vanuatu</option>
                            <option value="238">Vatican City State (Holy See)</option>
                            <option value="239">Venezuela</option>
                            <option value="240">Vietnam</option>
                            <option value="241">Virgin Islands (British)</option>
                            <option value="242">Virgin Islands (US)</option>
                            <option value="243">Wallis And Futuna Islands</option>
                            <option value="244">Western Sahara</option>
                            <option value="245">Yemen</option>
                            <option value="246">Zambia</option>
                            <option value="247">Zimbabwe</option>
                        </select>


                    </div>

                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="no_telepon" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>No. WhatsApp</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative">
                            <input name="no_telepon" id="no_telepon" type="text"
                                class="  number-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                        </div>

                    </div>

                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="email" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>Email</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative">
                            <input name="email" id="email" type="email"
                                class="   w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                        </div>

                    </div>

                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="username" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>Username</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative">
                            <input name="username" id="username" type="text"
                                class="  latin-only-input w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                        </div>

                    </div>

                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="password" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>Kata Sandi</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative" x-data="{ isPasswordVisible: false }">
                            <input name="password" id="password" :type="isPasswordVisible ? 'text' : 'password'"
                                class="   w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                            <div @click="isPasswordVisible = !isPasswordVisible"
                                class="absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-500 cursor-pointer">
                                <svg x-show="!isPasswordVisible" class="w-4 h-4" fill="none"
                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88">
                                    </path>
                                </svg>
                                <svg x-show="isPasswordVisible" class="w-4 h-4" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>

                        <span class="mt-1 block text-gray-400 text-xs">*Minimal 6 karakter dan memerlukan setidaknya
                            satu huruf, angka, serta simbol</span>
                    </div>

                    <div class="">
                        <div class="flex items-center gap-1">
                            <label for="password_confirmation" class="font-normal text-xs lg:text-sm">
                                <div class="flex flex-wrap items-center gap-x-1 ">
                                    <span>Konfirmasi Kata Sandi</span>
                                </div>
                            </label>
                            <span class="text-sm text-red-600 font-medium">*</span>
                        </div>

                        <div class="relative" x-data="{ isPasswordVisible: false }">
                            <input name="password_confirmation" id="password_confirmation"
                                :type="isPasswordVisible ? 'text' : 'password'"
                                class="   w-full bg-gray-50 mt-1 block p-2 lg:p-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded focus:outline-none focus:ring-primary-500 focus:border-primary-500 focus:z-10 text-xs lg:text-sm"
                                value="" required="">

                            <div @click="isPasswordVisible = !isPasswordVisible"
                                class="absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-500 cursor-pointer">
                                <svg x-show="!isPasswordVisible" class="w-4 h-4" fill="none"
                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88">
                                    </path>
                                </svg>
                                <svg x-show="isPasswordVisible" class="w-4 h-4" fill="none" stroke="currentColor"
                                    stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <input class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
                        id="disclaimer" name="disclaimer" required="" type="checkbox">
                    <label for="disclaimer" class="block text-xs lg:text-sm text-gray-900">
                        Saya menyatakan telah membaca dan menyetujui terkait
                        <a href="https://HLJI1cppo2Zy.id/supports/privacy-policy"
                            class="font-bold underline text-primary-500">Kebijakan Privasi</a>
                    </label>
                </div>
            </div>

            <div x-cloak="" x-data="{ otpSentViaModal: false }">
                <button @click="otpSentViaModal = true"
                    class="w-full flex justify-center p-4 border border-transparent text-base lg:text-lg font-medium rounded-md text-gray-500 bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500"
                    disabled="" id="nextButton" type="button">Selanjutnya</button>

                <div class="fixed z-50 inset-0" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                    x-show="otpSentViaModal">
                    <div class="min-h-screen flex items-center justify-center p-4 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
                        <div @click.outside="otpSentViaModal = false" style="max-height: 36rem!important;"
                            class="overflow-y-auto inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle w-full sm:max-w-lg">

                            <div class="bg-gray-50 text-center px-4 py-3 sm:px-6">
                                <span class="text-sm lg:text-lg font-medium">
                                    <div class="flex flex-wrap items-center gap-x-1 ">
                                        <span>Pilih Metode Pengiriman OTP</span>
                                    </div>

                                </span>
                            </div>

                            <div class="p-4 pb-2">
                                <div class="p-6 border-l-4 border-yellow-100 rounded-r-xl bg-yellow-50">
                                    <div class="flex">
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-yellow-800">Informasi</h3>
                                            <div class="mt-2 text-sm text-yellow-700">
                                                <ul role="list" class="pl-5 space-y-1 list-disc">
                                                    <li>Pilihan pengiriman OTP ini akan menjadi media notifikasi utama
                                                        kami kepada kamu</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 pt-2">
                                <div class="flex flex-wrap lg:flex-nowrap items-center gap-1 lg:gap-2">
                                    <label for="whatsappOtp"
                                        class="flex items-center gap-2 w-full p-3 rounded border">
                                        <input id="whatsappOtp" name="otp_sent_via" type="radio" value="WhatsApp"
                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300"
                                            required="">
                                        <span class="text-xs lg:text-sm">Whatsapp</span>
                                    </label>

                                    <label for="emailOtp" class="flex items-center gap-2 w-full p-3 rounded border">
                                        <input id="emailOtp" name="otp_sent_via" type="radio" value="Email"
                                            class="focus:ring-primary-500 h-4 w-4 text-primary-600 border-gray-300"
                                            required="">
                                        <span class="text-xs lg:text-sm">Email</span>
                                    </label>
                                </div>
                            </div>

                            <div class="flex items-center flex-row-reverse bg-gray-50 px-4 py-3 sm:px-6 gap-2">
                                <button type="submit"
                                    class="text-sm lg:text-base w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:w-auto">
                                    <div class="flex flex-wrap items-center gap-x-1 ">
                                        <span>Kirim OTP</span>
                                    </div>
                                </button>
                                <button @click="otpSentViaModal = false" type="button"
                                    class="w-full inline-flex justify-center rounded-md border p-2 border p-2-gray-300 shadow-sm px-4 py-2 bg-white text-sm lg:text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:w-auto sm:text-sm">
                                    <div class="flex flex-wrap items-center gap-x-1 ">
                                        <span>Kembali</span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</x-app>
