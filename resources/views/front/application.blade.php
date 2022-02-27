<html>
    {{-- HEAD --}}

    @include('layouts.header')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-wizard.css')}}">
    <style>
        .btn, .btn-primary{
            background-color: #b5a899 !important;
            border-radius: 0px !important;
            border: none !important;
        }
        .btn-primary:focus, .btn-primary:active, .btn-primary.active{
            background-color: #b5a899 !important;
        }
        .custom-control-input:checked ~ .custom-control-label::before{
            
            border-color: #b5a899 !important;;
            background-color: #b5a899 !important;
        }
        .form-control{
            border-radius: 0px !important;
        }
        
    </style>
    {{-- HEAD --}}
    <body>
        <div class="content-wrapper">
            
            <div class="content-body">
                <div class="d-flex justify-content-center mt-3">
                    <div class="col-md-8 col-sm-9 col-12 px-sm-3">
                        <!-- Horizontal Wizard -->
                        <section class="horizontal-wizard">
                            <div class="bs-stepper horizontal-wizard-example">
                                <div class="bs-stepper-header invisible" hidden>
                                    <div class="step" data-target="#account-details">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">1</span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">1</span>
                                                <span class="bs-stepper-subtitle">1</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#personal-info">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">2</span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">2</span>
                                                <span class="bs-stepper-subtitle">2</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#address-step">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">3</span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">3</span>
                                                <span class="bs-stepper-subtitle">3</span>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="line">
                                        <i data-feather="chevron-right" class="font-medium-2"></i>
                                    </div>
                                    <div class="step" data-target="#social-links">
                                        <button type="button" class="step-trigger">
                                            <span class="bs-stepper-box">4</span>
                                            <span class="bs-stepper-label">
                                                <span class="bs-stepper-title">4</span>
                                                <span class="bs-stepper-subtitle">4</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <div id="account-details" class="content">
                                        <div class="content-header">
                                            <h5 class="mb-0">Anmeldeformular für Mietinteressenten	</h5>
                                            <small class="text-muted">Belano Zuhause in</small>
                                        </div>
                                        <form>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="form-label" for="apartment_num">Wohnungsnummer</label>
                                                    @foreach ($items as $item)
                                                        <input type="text" class="form-control" id="apartment_num"
                                                        placeholder="" name="apartment_num" aria-label="apartment_num"
                                                        aria-describedby="apartment_num" value="{{$item->floor}}" readonly/>
                                                    @endforeach
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="floor">Stockwerk</label>
                                                    <input type="text" class="form-control" id="floor"
                                                    placeholder="" name="floor" aria-label="floor"
                                                    aria-describedby="floor" required/>
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="form-label" for="service_fee">Mietzins CHF/Mt. (inkl. Nebenkosten) zzgl. </label>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="form-label" for="reference_day">Gewünschter Bezugstermin </label>
                                                <input type="date" class="form-control" id="reference_day"
                                                placeholder="" name="reference_day" aria-label="reference_day"
                                                aria-describedby="reference_day" required/>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="form-label" for="underground_num">Anzahl gewünschter Tiefgaragen Plätze </label>
                                                <input type="text" class="form-control" id="underground_num"
                                                placeholder="" name="underground_num" aria-label="underground_num"
                                                aria-describedby="underground_num" required/>
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-outline-secondary btn-prev invisible" disabled>
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="personal-info" class="content">
                                        <div class="content-header">
                                            {{-- <h5 class="mb-0">Personal Info</h5>
                                            <small>Enter Your Personal Info.</small> --}}
                                        </div>
                                        <form>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h3 class="text-success"><span>1. Mieter </span></h3>
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" name="one_name" id="one__1" checked />
                                                            <label class="custom-control-label" for="one__1">Herr</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" name="one_name" id="one__2" />
                                                            <label class="custom-control-label" for="one__2">Frau</label>
                                                        </div>
                                                    </div>
                                                    <div class="demo-inline-spacing form-group">
                                                        <div class="custom-control custom-checkbox invisible">
                                                            <input type="checkbox" class="custom-control-input" id="one__3" checked />
                                                            <label class="custom-control-label" for="one__3">Ehepartner/in oder</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox invisible">
                                                            <input type="checkbox" class="custom-control-input" id="one__4" />
                                                            <label class="custom-control-label" for="one__4">Mitmieter/in</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_name">Name </label>
                                                        <input type="text" class="form-control" id="user_one_name"
                                                        placeholder="" name="user_one_name" aria-label="user_one_name"
                                                        aria-describedby="user_one_name" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_surname">Vorname </label>
                                                        <input type="text" class="form-control" id="user_one_surname"
                                                        placeholder="" name="user_one_surname" aria-label="user_one_surname"
                                                        aria-describedby="user_one_surname" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_birthday">Geburtsdatum </label>
                                                        <input type="text" class="form-control" id="user_one_birthday"
                                                        placeholder="" name="user_one_birthday" aria-label="user_one_birthday"
                                                        aria-describedby="user_one_birthday" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_citizenship">Zivilstand </label>
                                                        <input type="text" class="form-control" id="user_one_citizenship"
                                                        placeholder="" name="user_one_citizenship" aria-label="user_one_citizenship"
                                                        aria-describedby="user_one_citizenship" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox ">
                                                            <span>Ausländer</span>
                                                        </div>
                                                        <div class="demo-inline-spacing">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="one_foreigner" id="one__5" checked />
                                                                <label class="custom-control-label" for="one__5">Ja</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="one_foreigner" id="one__6" />
                                                                <label class="custom-control-label" for="one__6">Nein</label>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_foreigner_id">Ausländerausweis(Bitte Kopie des Ausländerausweises beilegen) </label>
                                                    </div>
                                                    <div class="demo-inline-spacing form-group">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="one_foreigner_id" id="one__7" checked />
                                                            <label class="custom-control-label" for="one__7">C</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="one_foreigner_id" id="one__8"  />
                                                            <label class="custom-control-label" for="one__8">B</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="one_foreigner_id" id="one__9"  />
                                                            <label class="custom-control-label" for="one__9">L</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <span>weitere</span>
                                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="" placeholder="" name="" aria-label="" aria-describedby=""/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_current_address">Jetzige Adresse </label>
                                                        <input type="text" class="form-control" id="user_one_current_address"
                                                        placeholder="" name="user_one_current_address" aria-label="user_one_current_address"
                                                        aria-describedby="user_one_current_address" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_zipcode">PLZ/Ort </label>
                                                        <input type="text" class="form-control" id="user_one_zipcode"
                                                        placeholder="" name="user_one_zipcode" aria-label="user_one_zipcode"
                                                        aria-describedby="user_one_zipcode" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_pri_phonenum">Telefon Privat </label>
                                                        <input type="text" class="form-control" id="user_one_pri_phonenum"
                                                        placeholder="" name="user_one_pri_phonenum" aria-label="user_one_pri_phonenum"
                                                        aria-describedby="user_one_pri_phonenum" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_business_phonenum">Telefon Geschäft </label>
                                                        <input type="text" class="form-control" id="user_one_business_phonenum"
                                                        placeholder="" name="user_one_business_phonenum" aria-label="user_one_business_phonenum"
                                                        aria-describedby="user_one_business_phonenum" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_mobile_phonenum">Mobiltelefon </label>
                                                        <input type="text" class="form-control" id="user_one_mobile_phonenum"
                                                        placeholder="" name="user_one_mobile_phonenum" aria-label="user_one_mobile_phonenum"
                                                        aria-describedby="user_one_mobile_phonenum" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_email">E-Mail </label>
                                                        <input type="email" class="form-control" id="user_one_email"
                                                        placeholder="" name="user_one_email" aria-label="user_one_email"
                                                        aria-describedby="user_one_email" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_profession">Beruf </label>
                                                        <input type="text" class="form-control" id="user_one_profession"
                                                        placeholder="" name="user_one_profession" aria-label="user_one_profession"
                                                        aria-describedby="user_one_profession" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_employer">Arbeitgeber </label>
                                                        <input type="text" class="form-control" id="user_one_employer"
                                                        placeholder="" name="user_one_employer" aria-label="user_one_employer"
                                                        aria-describedby="user_one_employer" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_address">Adresse </label>
                                                        <input type="text" class="form-control" id="user_one_address"
                                                        placeholder="" name="user_one_address" aria-label="user_one_address"
                                                        aria-describedby="user_one_address" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_employed_since">In Anstellung seit </label>
                                                        <input type="text" class="form-control" id="user_one_employed_since"
                                                        placeholder="" name="user_one_employed_since" aria-label="user_one_employed_since"
                                                        aria-describedby="user_one_employed_since" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_employment_relationship">Anstellungsverhältnis </label>
                                                        <input type="text" class="form-control" id="user_one_employment_relationship"
                                                        placeholder="" name="user_one_employment_relationship" aria-label="user_one_employment_relationship"
                                                        aria-describedby="user_one_employment_relationship" required/>
                                                    </div>
                                                    <div class="demo-inline-spacing form-group">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="one_temporary" id="one__10" checked />
                                                            <label class="custom-control-label" for="one__10">Temporär</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="one_temporary" id="one__11" />
                                                            <label class="custom-control-label" for="one__11">Festanstellung</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_manager_name">Name des Vorgesetzten </label>
                                                        <input type="text" class="form-control" id="user_one_manager_name"
                                                        placeholder="" name="user_one_manager_name" aria-label="user_one_manager_name"
                                                        aria-describedby="user_one_manager_name" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_manager_phone">Telefon des Vorgesetzten </label>
                                                        <input type="text" class="form-control" id="user_one_manager_phone"
                                                        placeholder="" name="user_one_manager_phone" aria-label="user_one_manager_phone"
                                                        aria-describedby="user_one_manager_phone" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_year_salary">Brutto-Gehalt pro Jahr bis ca</label>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" name="one_price" class="custom-control-input" value="30000" id="one__12" checked />
                                                                <label class="custom-control-label" for="one__12">CHF 30,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" name="one_price" class="custom-control-input" value="40000" id="one__13" />
                                                                <label class="custom-control-label" for="one__13">CHF 40,000</label>
                                                            </div>
                                                        </div>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="one_price" value="50000" id="one__14" />
                                                                <label class="custom-control-label" for="one__14">CHF 50,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="one_price" value="60000" id="one__15" />
                                                                <label class="custom-control-label" for="one__15">CHF 60,000</label>
                                                            </div>
                                                        </div>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" name="one_price" class="custom-control-input" value="70000" id="one__16" />
                                                                <label class="custom-control-label" for="one__16">CHF 70,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" name="one_price" class="custom-control-input" value="80000" id="one__17" />
                                                                <label class="custom-control-label" for="one__17">CHF 80,000</label>
                                                            </div>
                                                        </div>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" value="90000" name="one_price" id="one__18" />
                                                                <label class="custom-control-label" for="one__18">CHF 90,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio"  name="one_price" value="100000" class="custom-control-input" id="one__19" />
                                                                <label class="custom-control-label" for="one__19">Mehr</label>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_how_long_lived">Seit wann wohnen Sie an der gegenwärtigen Adresse? </label>
                                                        <input type="text" class="form-control" id="user_one_how_long_lived"
                                                        placeholder="" name="user_one_how_long_lived" aria-label="user_one_how_long_lived"
                                                        aria-describedby="user_one_how_long_lived" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_homeowner_name">Name des Hauseigentümers/Verwaltung/Tel.-Nr </label>
                                                        <input type="text" class="form-control" id="user_one_homeowner_name"
                                                        placeholder="" name="user_one_homeowner_name" aria-label="user_one_homeowner_name"
                                                        aria-describedby="user_one_homeowner_name" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_homeowner_name">Begründen Sie am Ort des von Ihnen gewünschten Mietobjektes den	zivilrechtlichen Wohnsitz?	 </label>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" name="one_eesidence" class="custom-control-input" id="one__20" checked />
                                                                <label class="custom-control-label" for="one__20">Hauptwohnsitz</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="one_eesidence" id="one__21" />
                                                                <label class="custom-control-label" for="one__21">2. Wohnsitz</label>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="col-6">
                                                    <h3 class="text-success"><span>2. Mieter </span></h3>
                                                    <div class="demo-inline-spacing">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" name="two_name" id="two__1" checked />
                                                            <label class="custom-control-label" for="two__1">Ehepartner/in oder</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" name="two_name" id="two__2" />
                                                            <label class="custom-control-label" for="two__2">Mitmieter/in</label>
                                                        </div>
                                                    </div>
                                                    <div class="demo-inline-spacing form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" name="two_name" id="two__3" checked />
                                                            <label class="custom-control-label" for="two__3">Herr</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="radio" class="custom-control-input" name="two_name" id="two__4" />
                                                            <label class="custom-control-label" for="two__4">Frau</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_name">Name </label>
                                                        <input type="text" class="form-control" id="user_two_name"
                                                        placeholder="" name="user_two_name" aria-label="user_two_name"
                                                        aria-describedby="user_two_name" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_surname">Vorname </label>
                                                        <input type="text" class="form-control" id="user_two_surname"
                                                        placeholder="" name="user_two_surname" aria-label="user_two_surname"
                                                        aria-describedby="user_two_surname" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_birthday">Geburtsdatum </label>
                                                        <input type="text" class="form-control" id="user_two_birthday"
                                                        placeholder="" name="user_two_birthday" aria-label="user_two_birthday"
                                                        aria-describedby="user_two_birthday" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_citizenship">Zivilstand </label>
                                                        <input type="text" class="form-control" id="user_two_citizenship"
                                                        placeholder="" name="user_two_citizenship" aria-label="user_two_citizenship"
                                                        aria-describedby="user_two_citizenship" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox ">
                                                            <span>Ausländer</span>
                                                        </div>
                                                        <div class="demo-inline-spacing">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_foreigner" id="two__5" checked />
                                                                <label class="custom-control-label" for="two__5">Ja</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_foreigner" id="two__6" />
                                                                <label class="custom-control-label" for="two__6">Nein</label>
                                                            </div>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_foreigner_id">Ausländerausweis(Bitte Kopie des Ausländerausweises beilegen) </label>
                                                    </div>
                                                    <div class="demo-inline-spacing form-group">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="two_foreigner_id" id="two__7" checked />
                                                            <label class="custom-control-label" for="two__7">C</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="two_foreigner_id" id="two__8" />
                                                            <label class="custom-control-label" for="two__8">B</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="two_foreigner_id" id="two__9" />
                                                            <label class="custom-control-label" for="two__9">L</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <span>weitere</span>
                                                            <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="" placeholder="" name="" aria-label="" aria-describedby=""/>
                                                        </div>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_current_address">Jetzige Adresse </label>
                                                        <input type="text" class="form-control" id="user_two_current_address"
                                                        placeholder="" name="user_two_current_address" aria-label="user_two_current_address"
                                                        aria-describedby="user_two_current_address" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_zipcode">PLZ/Ort </label>
                                                        <input type="text" class="form-control" id="user_two_zipcode"
                                                        placeholder="" name="user_two_zipcode" aria-label="user_two_zipcode"
                                                        aria-describedby="user_two_zipcode" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_pri_phonenum">Telefon Privat </label>
                                                        <input type="text" class="form-control" id="user_two_pri_phonenum"
                                                        placeholder="" name="user_two_pri_phonenum" aria-label="user_two_pri_phonenum"
                                                        aria-describedby="user_two_pri_phonenum" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_business_phonenum">Telefon Geschäft </label>
                                                        <input type="text" class="form-control" id="user_two_business_phonenum"
                                                        placeholder="" name="user_two_business_phonenum" aria-label="user_two_business_phonenum"
                                                        aria-describedby="user_two_business_phonenum" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_mobile_phonenum">Mobiltelefon </label>
                                                        <input type="text" class="form-control" id="user_two_mobile_phonenum"
                                                        placeholder="" name="user_two_mobile_phonenum" aria-label="user_two_mobile_phonenum"
                                                        aria-describedby="user_two_mobile_phonenum" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_email">E-Mail </label>
                                                        <input type="email" class="form-control" id="user_two_email"
                                                        placeholder="" name="user_two_email" aria-label="user_two_email"
                                                        aria-describedby="user_two_email" required/>
                                                    </div>
                
                                                    
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_profession">Beruf </label>
                                                        <input type="text" class="form-control" id="user_two_profession"
                                                        placeholder="" name="user_two_profession" aria-label="user_two_profession"
                                                        aria-describedby="user_two_profession" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_employer">Arbeitgeber </label>
                                                        <input type="text" class="form-control" id="user_two_employer"
                                                        placeholder="" name="user_two_employer" aria-label="user_two_employer"
                                                        aria-describedby="user_two_employer" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_address">Adresse </label>
                                                        <input type="text" class="form-control" id="user_two_address"
                                                        placeholder="" name="user_two_address" aria-label="user_two_address"
                                                        aria-describedby="user_two_address" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_employed_since">In Anstellung seit </label>
                                                        <input type="text" class="form-control" id="user_two_employed_since"
                                                        placeholder="" name="user_two_employed_since" aria-label="user_two_employed_since"
                                                        aria-describedby="user_two_employed_since" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_employment_relationship">Anstellungsverhältnis </label>
                                                        <input type="text" class="form-control" id="user_two_employment_relationship"
                                                        placeholder="" name="user_two_employment_relationship" aria-label="user_two_employment_relationship"
                                                        aria-describedby="user_two_employment_relationship" required/>
                                                    </div>
                                                    <div class="demo-inline-spacing form-group">
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="two_temporary" id="two__10" checked />
                                                            <label class="custom-control-label" for="two__10">Temporär</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox ">
                                                            <input type="radio" class="custom-control-input" name="two_temporary" id="two__11" />
                                                            <label class="custom-control-label" for="two__11">Festanstellung</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_manager_name">Name des Vorgesetzten </label>
                                                        <input type="text" class="form-control" id="user_two_manager_name"
                                                        placeholder="" name="user_two_manager_name" aria-label="user_two_manager_name"
                                                        aria-describedby="user_two_manager_name" required/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_manager_phone">Telefon des Vorgesetzten </label>
                                                        <input type="text" class="form-control" id="user_two_manager_phone"
                                                        placeholder="" name="user_two_manager_phone" aria-label="user_two_manager_phone"
                                                        aria-describedby="user_two_manager_phone" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_one_year_salary">Brutto-Gehalt pro Jahr bis ca</label>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__12" checked />
                                                                <label class="custom-control-label" for="two__12">CHF 30,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__13" />
                                                                <label class="custom-control-label" for="two__13">CHF 40,000</label>
                                                            </div>
                                                        </div>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__14" />
                                                                <label class="custom-control-label" for="two__14">CHF 50,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__15" />
                                                                <label class="custom-control-label" for="two__15">CHF 60,000</label>
                                                            </div>
                                                        </div>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__16" />
                                                                <label class="custom-control-label" for="two__16">CHF 70,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__17" />
                                                                <label class="custom-control-label" for="two__17">CHF 80,000</label>
                                                            </div>
                                                        </div>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio"  class="custom-control-input" name="two_price" id="two__18" />
                                                                <label class="custom-control-label" for="two__18">CHF 90,000</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_price" id="two__19" />
                                                                <label class="custom-control-label" for="two__19">Mehr</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_how_long_lived">Seit wann wohnen Sie an der gegenwärtigen Adresse? </label>
                                                        <input type="text" class="form-control" id="user_two_how_long_lived"
                                                        placeholder="" name="user_two_how_long_lived" aria-label="user_two_how_long_lived"
                                                        aria-describedby="user_two_how_long_lived" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label" for="user_two_homeowner_name">Name des Hauseigentümers/Verwaltung/Tel.-Nr </label>
                                                        <input type="text" class="form-control" id="user_two_homeowner_name"
                                                        placeholder="" name="user_two_homeowner_name" aria-label="user_two_homeowner_name"
                                                        aria-describedby="user_two_homeowner_name" required/>
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label class="form-label">Begründen Sie am Ort des von Ihnen gewünschten Mietobjektes den	zivilrechtlichen Wohnsitz?	 </label>
                                                        <div class="demo-inline-spacing form-group">
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_eesidence" id="two__20" checked />
                                                                <label class="custom-control-label" for="two__20">Hauptwohnsitz</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox ">
                                                                <input type="radio" class="custom-control-input" name="two_eesidence" id="two__21" />
                                                                <label class="custom-control-label" for="two__21">2. Wohnsitz</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                
                                                </div>
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="address-step" class="content">
                                        <div class="content-header">
                                        
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label class="form-label" for="reason_flatchange">Grund des Wohnungswechsel </label>
                                                <input type="text" class="form-control" id="reason_flatchange"
                                                placeholder="" name="reason_flatchange" aria-label="reason_flatchange"
                                                aria-describedby="reason_flatchange" required/>
                                            </div>
                                            <div class="form-group row">
                                                <label class="form-label" for="reason_flatchange">Weitere Mitglieder des Haushalt oder zusätzliche Bewohner (inkl. Jahrgang) </label>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="adult_bir">Erwachsene</label>
                                                    <input type="text" class="form-control" id="adult_bir"
                                                    placeholder="" name="adult_bir" aria-label="adult_bir"
                                                    aria-describedby="adult_bir" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="child_bird">Kinder</label>
                                                    <input type="text" class="form-control" id="child_bird"
                                                    placeholder="" name="child_bird" aria-label="child_bird"
                                                    aria-describedby="child_bird" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="form-label w-100" for="reason_flatchange">Größe </label>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="house_size_min">Mindestmaß (m<sup>2</sup>)</label>
                                                    <input type="number" class="form-control" id="house_size_min" max="9998"
                                                    placeholder="" name="house_size_min" aria-label="house_size_min"
                                                    aria-describedby="house_size_min" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="house_size_max">maximale Größe (m<sup>2</sup>)</label>
                                                    <input type="number" class="form-control" id="house_size_max" max="9999"
                                                    placeholder="" name="house_size_max" aria-label="house_size_max"
                                                    aria-describedby="house_size_max" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="reason_flatchange">Haben Sie ein Haustier? Wenn ja, welches? </label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="two__22" checked />
                                                        <label class="custom-control-label" for="two__22">Ja</label>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id="pets"
                                                        placeholder="" name="pets" aria-label="pets"
                                                        aria-describedby="pets"/>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="two__23" />
                                                        <label class="custom-control-label" for="two__23">Nein</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Spielen Sie ein Instrument? Wenn ja, welches? </label>
                                                <div class="demo-inline-spacing">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="two__24" checked />
                                                        <label class="custom-control-label" for="two__24">Ja</label>
                                                    </div>
                                                    <div>
                                                        <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" id=""
                                                        placeholder="" name="" aria-label=""
                                                        aria-describedby=""/>
                                                    </div>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="two__25" />
                                                        <label class="custom-control-label" for="two__25">Nein</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="form-label" for="user_one_year_salary">Brutto-Gehalt pro Jahr bis ca</label>
                                                <div class="demo-inline-spacing form-group">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="two__26" checked />
                                                        <label class="custom-control-label" for="two__26">Mieterdepot bei Bank </label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="two__27" />
                                                        <label class="custom-control-label" for="two__27">Versicherung Swisscaution</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Wie sollen die Namensschilder am Briefkasten beschriftet werden? (Verrechnung erfolgt mit separater Post.)</label>
                                                <input type="text" class="form-control" id=""
                                                placeholder="" name="" aria-label=""
                                                aria-describedby=""/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Möchten Sie uns noch etwas mitteilen?</label>
                                                <input type="text" class="form-control" id=""
                                                placeholder="" name="" aria-label=""
                                                aria-describedby=""/>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="user_one_year_salary">Wie haben Sie von dieser Wohnung erfahren?</label>
                                                <div class="demo-inline-spacing form-group">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="two__28" checked />
                                                        <label class="custom-control-label" for="two__28">Bekannte </label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="two__29"  />
                                                        <label class="custom-control-label" for="two__29">Internet/Anbieter</label>
                                                    </div>
                                                </div>
                                                <div class="demo-inline-spacing form-group">
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="two__30" />
                                                        <label class="custom-control-label" for="two__30">Inserat/Zeitung </label>
                                                    </div>
                                                    <div class="custom-control custom-checkbox ">
                                                        <input type="checkbox" class="custom-control-input" id="two__31" />
                                                        <label class="custom-control-label" for="two__31">andere</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Der Interessent nimmt davon Kenntnis, dass er ein verzinsliches Mietzinsdepot von max. 3 Monatszinsen zu leisten hat. Falls der Interessent für einen Mietvertrag ernsthaft in Frage kommt, können Referenzen beim Arbeitgeber und der bisherigen Hauseigentümerschaft / Verwaltung eingeholt werden. Es ist deshalb von Vorteil, wenn die entsprechenden Felder bereits ausgefüllt sind.
                                                </label>
                
                                                <label class="mt-5 font-weight-bold">
                                                    Der Anmeldung muss von jedem Interessenten ein aktueller Betreibungsregister-auszug beigelegt werden. Bitte stellen Sie uns einen AHV-/BVG- Nachweis und/oder einen Vermögensnachweis zu, wenn Sie kein monatliches Gehalt mehr beziehen.
                                                </label>
                
                                                <label class="mt-5">
                                                    Der Interessent erklärt hiermit, dass alle gemachten Angaben in jeder Beziehung den Tatsachen entsprechen und nimmt zur Kenntnis, dass unrichtige Angaben den Vermieter zu Vertragsauflösung berechtigen. Die Angaben werden von der Verwaltung diskret behandelt. Gefragt wird nichts aus Neugierde, sondern um eine gute Hausgemeinschaft zu erreichen und die Sorgfaltspflicht gegenüber dem Hauseigentümer zu erfüllen. Belano Zuhause dankt für Ihr Verständnis.
                                                </label>
                
                                            </div>
                                            <div class="form-group row">
                                                <label class="form-label"></label>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="one_place_day">Ort und Datum</label>
                                                    <input type="text" class="form-control" id="one_place_day"
                                                    placeholder="" name="one_place_day" aria-label="one_place_day"
                                                    aria-describedby="one_place_day" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label" for="two_place_day">Ort und Datum</label>
                                                    <input type="text" class="form-control" id="two_place_day"
                                                    placeholder="" name="two_place_day" aria-label="two_place_day"
                                                    aria-describedby="two_place_day" required/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label class="form-label d-block" for="one_place_day">Mieter 1</label>
                                                    <label class="form-label" for="one_place_day">Unterschrift</label>
                                                    <input type="text" class="form-control" id="one_place_day"
                                                    placeholder="" name="one_place_day" aria-label="one_place_day"
                                                    aria-describedby="one_place_day" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label d-block" for="two_place_day">Mieter 2</label>
                                                    <label class="form-label" for="two_place_day">Unterschrift</label>
                                                    <input type="text" class="form-control" id="two_place_day"
                                                    placeholder="" name="two_place_day" aria-label="two_place_day"
                                                    aria-describedby="two_place_day" required/>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-between">
                                            <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button>
                                            <button class="btn btn-primary btn-next form-submit">
                                                <span class="align-middle d-sm-inline-block d-none">Next</span>
                                                <i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div id="social-links" class="content">
                                        <div class="content-header">
                                            {{-- <h5 class="mb-0">Social Links</h5>
                                            <small>Enter Your Social Links.</small> --}}
                                        </div>
                                        <form>
                                            <div class="row justify-content-center">
                                               WELCOME 
                                            </div>
                                        </form>
                                        <div class="d-flex justify-content-between">
                                            {{-- <button class="btn btn-primary btn-prev">
                                                <i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
                                                <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                            </button> --}}
                                            {{-- <button class="btn btn-success btn-submit">Submit</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- /Horizontal Wizard -->
                    </div>
                </div>

            </div>

        </div>
        @include('layouts.footer')
        <script src="{{asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
        <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

        <script src="{{asset('app-assets/js/scripts/forms/form-wizard.js')}}"></script>
        <script>
            $(function(){                
                $('.form-submit').on('click', function(e){
                    var user_one_name = $('#user_one_name').val();
                    var user_one_email = $('#user_one_email').val();
                    var user_one_pri_phonenum = $('#user_one_pri_phonenum').val();
                    var house_price = $('input[name=one_price]:checked').val();
                    var house_min_size = $('#house_size_min').val();
                    var house_max_size = $('#house_size_max').val();
                    var house_min_price, house_max_price;
                    if(house_price == 30000){
                        house_max_price = 30000;
                        house_min_price = 0;
                    }
                    else if(house_price == 40000){
                        house_max_price = 40000;
                        house_min_price = 30001;
                    }
                    else if(house_price == 50000){
                        house_max_price = 50000;
                        house_min_price = 40001;
                    }
                    else if(house_price == 60000){
                        house_max_price = 60000;
                        house_min_price = 50001;
                    }
                    else if(house_price == 70000){
                        house_max_price = 70000;
                        house_min_price = 60001;
                    }
                    else if(house_price == 80000){
                        house_max_price = 80000;
                        house_min_price = 70001;
                    }
                    else if(house_price == 90000){
                        house_max_price = 90000;
                        house_min_price = 80001;
                    }
                    else if(house_price == 100000){
                        house_max_price = 999999;
                        house_min_price = 90001;
                    }
                    var customer_region = '@foreach ($items as $item) {{$item->id}} @endforeach';
                    
                    var url = "/customer-create";
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'post',
                        url: url,
                        data: {customer_name : user_one_name, customer_email : user_one_email, customer_phone : user_one_pri_phonenum, customer_min_price : house_min_price, customer_max_price : house_max_price, customer_max_size : house_max_size, customer_min_size : house_min_size, customer_region : customer_region},
                        success: function (data) {
                            if (data['success']) {
                                console.log('success');
                            }
                            else {
                                console.log('error');
                            }
                        }
                    })
                })
            })
        </script>
    </body>
</html>