@extends('layouts.admin.master')

@section('title')Create Listing
    {{ $title }}
@endsection

@push('css')
    <style>
        .b-b-dark2 {
            border-bottom: 1px solid #d1d1d1 !important;
            padding-bottom: 15px;
        }

        .img-card {
            position: relative;
            border: 1px dashed gray;
            height: 150px;
            background: #ebebeb;
        }
        .add-img{
            border: 3px dashed #e8e8f7 !important;
            border-radius: 10px;
            background-color: #fff;
            cursor: pointer;
        }
        .img-card img {
            width: 100%;
            height: 100%;
            object-fit: scale-down;
        }

        .img-btn {
            width: 25px;
            height: 25px;
            line-height: 25px;
            border-radius: 100px;
            text-align: center;
            background: rgb(0, 0, 0, 0.40);
        }

        .img-options {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 2;
            display: flex;
            justify-content: flex-end;
            padding: 7px;
            transition: all 0.3s ease-in-out;
        }

        .img-options i {
            font-size: 11px;
        }

    </style>
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Listing Create Form</h3>
        @endslot
        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
        <li class="breadcrumb-item">Listing</li>
        <li class="breadcrumb-item">Create</li>
    @endcomponent
    {{-- oncontextmenu="return false;" --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>Listing Form </h5>
                    </div>
                    <div class="card-body">
                        <div class="f1">
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step"><a class="btn btn-primary" href="#step-1"><i
                                                class="fa fa-user"></i></a>
                                        <p>General Information</p>
                                    </div>
                                    <div class="stepwizard-step"><a class="btn btn-light" disabled href="#step-2"><i
                                                class="fa fa-key"></i></a>
                                        <p>Listing Detail</p>
                                    </div>
                                    <div class="stepwizard-step"><a class="btn btn-light" href="#step-3"><i
                                                class="fa fa-twitter"></i></a>
                                        <p>General Property Features</p>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="setup-content" id="step-1">
                                <form action="{{ Route('admin.listing.insert') }}" method="POST" role="form">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label for="businessname" class="form-label">Business Name *</label>
                                                    <input class="form-control" id="businessname" type="text"
                                                        name="business" value="@if (isset($listing)){{ $listing->title }} @else {{ old('title') }}@endif"
                                                        placeholder="Business Name" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label for="bs" class="form-label">Business Slug *</label>
                                                    <input class="form-control" id="inputslug" name="slug"
                                                        placeholder="Business Slug" required=""
                                                        value="@if (isset($listing)){{ $listing->slug }} @else {{ old('slug') }}@endif">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="cat-type">Category *</label>
                                                    @if (isset($listing)) <input type="hidden" id="category" value="{{ $listing->category }}"> @else {{ old('category') }}@endif
                                                    <select id="cat-type" name="category"
                                                        class="form-control form-control-lg wide mb-3">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label for="email" class="form-label">Email Address *</label>
                                                    <input class="form-control" value="@if (isset($listing)){{ $listing->email }} @else {{ old('email') }}@endif"
                                                        id="email" type="email" name="email" placeholder="" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label for="pnumber" class="form-label">Phone Number *</label>
                                                    <input class="form-control" value="@if (isset($listing)){{ $listing->phone }} @else {{ old('phone') }}@endif"
                                                        id="pnumber" type="text" name="phone" maxlength="14" minlength="12"
                                                        placeholder="Phone Number" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label for="WebSite" class="form-label">WebSite</label>
                                                    <input class="form-control" value="@if (isset($listing)){{ $listing->website }} @else {{ old('web') }}@endif"
                                                        id="website" type="text" name="web" placeholder="WebSite">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h6 class="b-b-dark2">Location & Address</h6><br>
                                        <div class="row">
                                            @php
                                                if (isset($listing)) {
                                                    $addressArr = explode(',', $listing->address);
                                                }
                                                
                                            @endphp
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-group">
                                                    <label for="paddress" class="form-label">Address 1 *</label>
                                                    <input class="form-control" id="paddress" type="text" name="address1"
                                                        placeholder="Permanent addres" required
                                                        value="@if (isset($listing)){{ $addressArr[0] }} @else {{ old('address1') }}@endif">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="form-group">
                                                    <label for="address2" class="form-label">Address 2</label>
                                                    <input class="form-control" id="address2" type="text"
                                                        value="@if (isset($listing)){{ $addressArr[1] }} @else {{ old('address2') }}@endif" name="address2"
                                                        placeholder="Address">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label form-label" for="country">Country*</label>
                                                    <select class="form-select" required name="country"
                                                        aria-label="Default select example" id="country">
                                                        <option selected disabled>Select Country</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label form-label">State*</label>
                                                    <select class="form-select" required name="state"
                                                        aria-label="Default select example" id="state">
                                                        <option selected disabled>Select State</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label form-label">City*</label>
                                                    <select class="form-select" required name="city"
                                                        aria-label="Default select example" id="city">
                                                        <option selected disabled>Select City</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label form-label" for="zip">Zip*</label>
                                                    <input class="form-control" id="zip" value="@if (isset($listing)){{ $listing->zip }} @else {{ old('zip') }}@endif"
                                                        type="text" name="zip" placeholder="Zip Code" required="">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label form-label" for="Latitude">Latitude*</label>
                                                    <input class="form-control" id="latitude"
                                                        value="@if (isset($listing)){{ $listing->lati }} @else {{ old('zip') }}@endif" name="latitude" type="text"
                                                        placeholder="Latitude" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="form-group">
                                                    <label class="text-label form-label" for="Longitude">Longitude*</label>
                                                    <input class="form-control" id="longitude"
                                                        value="@if (isset($listing)){{ $listing->longi }} @else {{ old('zip') }}@endif" type="text" name="longitude"
                                                        placeholder="Longitude" required="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="f1-buttons">
                                        @if (isset($listing)) <input type="hidden" name="id" value="{{ $listing->id }}"> @endif
                                        <input type="hidden" id="getId" name="type" value="{{ $catSlug }}">
                                        <input type="hidden" name="form" value="step1">
                                        <input class="btn btn-primary" type="submit" value="Save & Next"/>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset class="setup-content" id="step-2">
                                <form action="{{ Route('admin.listing.insert') }}" id="form2" method="POST" role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <h6 class="b-b-dark2">Images And Videos</h6><br>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="row">
                                                    <label for="img" class="col-2 mx-2 p-0 img-card add-img d-flex justify-content-center align-items-center">
                                                        <i class="fa fa-camera fs-2"></i>
                                                    </label>
                                                    @if (isset($listing->imgs))
                                                        @foreach ($listing->imgs as $items)
                                                            <div class="col-2 mx-2 rounded p-0 img-card">
                                                                <img src="{{ asset('storage/files/' . $items['filename']) }}" alt="" />
                                                                <div class="img-options">
                                                                    <a href="javascript:void(0);" class="img-btn me-2"><i class="icon-eye text-white"></i></a>
                                                                    <a href="javascript:void(0);" data-imgid="{{ $items['id'] }}" class="img-btn img-del"><i class="icon-trash text-white"></i></a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                            <input class="form-control" hidden name="image[]" id="img" type="file" multiple />
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h6 class="b-b-dark2">Listing Helpers</h6><br>
                                        <div class="row">
                                            <div class="form-group  col-lg-4 mb-3">
                                                <label>Status</label>
                                                <div class="col-sm-9">
                                                    <div class="form-check radio radio-primary">
                                                        <input class="form-check-input" id="radio11" type="radio"
                                                            name="status" value="1" @if (isset($listing) && $listing->status == 1){{ 'checked' }} @else {{ 'checked' }} @endif id="active" />
                                                        <label class="form-check-label" for="radio11">Active</label>
                                                    </div>
                                                    <div class="form-check radio radio-primary">
                                                        <input class="form-check-input" id="radio22" type="radio"
                                                            name="status" value="0" @if (isset($listing) && $listing->status == 0){{ 'checked' }}@endif>
                                                        <label class="form-check-label" for="radio22">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4 mb-3">
                                                <label class="text-label form-label" for="keyword">Keywords*</label>
                                                <input class="f1-password form-control" id="keyword" type="text"
                                                    name="keywords" placeholder="Keywords.."
                                                    value="@if (isset($listing)){{ $listing->keywords }} @else {{ old('zip') }}@endif" required="">
                                            </div>
                                            <div class="form-group col-lg-4 mb-3">
                                                <label class="text-label form-label" for="package">Package*</label>
                                                @if (isset($listing)) <input type="hidden" id="packedit" value="{{ $listing->package }}"> @endif
                                                <select class="form-select" name="package"
                                                    aria-label="Default select example" id="package">
                                                    <option selected value="0">Free Listing</option>
                                                    <option value="1">Premium AD Package</option>
                                                    <option value="2">Gold AD Package</option>
                                                    <option value="3">Silver AD Package</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h6 class="b-b-dark2">General Company Description </h6><br>
                                        <div class="form-group border-2">
                                            <label class="form-label" for="exampleFormControlTextarea4"
                                                for="descr">Description</label>
                                            <textarea class="form-control" id="description" rows="5" cols="100"
                                                name="description">@if (isset($listing)){{ $listing->description }} @else {{ old('zip') }}@endif</textarea>
                                        </div>
                                        <div class="f1-buttons">
                                            @if (isset($listing)) <input type="hidden" name="id" value="{{ $listing->id }}"> @endif
                                            <a href="#step-1" class="btn btn-primary btn-previous">Previous</a>
                                            <input type="hidden" name="form" value="step2">
                                            <input class="btn btn-primary" type="submit" value="Save & Next"/>
                                        </div>
                                    </div>
                                </form>
                            </fieldset>
                            <fieldset class="setup-content" id="step-3">
                                <form action="{{ Route('admin.listing.insert') }}" method="POST" role="form">
                                    @csrf
                                    @php
                                        if (isset($listing)) {
                                            $amikey = explode(',', $listing->aminities);
                                        }
                                    @endphp
                                    <div class="col-md-12">
                                        <h6 class="b-b-dark2">Property Features </h6>
                                        <div class="row">
                                            @foreach ($aminities as $item)
                                                @if ($item['type'] == 'pf')
                                                    <div class="col-md-4">
                                                        <div class="form-group m-t-15 m-checkbox-inline mb-0">
                                                            <div class="checkbox checkbox-dark">
                                                                <input id="inline{{ $item->id }}" type="checkbox"
                                                                    @if (isset($listing) && in_array($item->id, $amikey)) checked  @endif value="{{ $item->id }}"
                                                                    name="pf[]">
                                                                <label class="form-check-label"
                                                                    for="inline{{ $item->id }}">{{ $item->aminities }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h6 class="b-b-dark2">Property Services </h6>
                                        <div class="row">
                                            @foreach ($aminities as $item)
                                                @if ($item['type'] == 'ps')
                                                    <div class="col-md-4">
                                                        <div class="form-group m-t-15 m-checkbox-inline mb-0">
                                                            <div class="checkbox checkbox-dark">
                                                                <input id="inline{{ $item->id }}" type="checkbox"
                                                                    @if (isset($listing) && in_array($item->id, $amikey)) checked  @endif value="{{ $item->id }}"
                                                                    name="ps[]">
                                                                <label class="form-check-label"
                                                                    for="inline{{ $item->id }}">{{ $item->aminities }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <h6 class="b-b-dark2">Levels Of Housing Care Offered </h6>
                                        <div class="row">
                                            @foreach ($aminities as $item)
                                                @if ($item['type'] == 'lhc')
                                                    <div class="col-md-4">
                                                        <div class="form-group m-t-15 m-checkbox-inline mb-0">
                                                            <div class="checkbox checkbox-dark">
                                                                <input id="inline{{ $item->id }}" type="checkbox"
                                                                    @if (isset($listing) && in_array($item->id, $amikey)) checked  @endif value="{{ $item->id }}"
                                                                    name="lhc[]">
                                                                <label class="form-check-label"
                                                                    for="inline{{ $item->id }}">{{ $item->aminities }}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="f1-buttons">
                                        @if (isset($listing)) <input type="hidden" name="id" value="{{ $listing->id }}"> @endif
                                        <a href="#step-2" class="btn btn-primary btn-previous">Previous</a>
                                        <input type="hidden" name="form" value="step3">
                                        <input type="submit" class="btn btn-success">
                                    </div>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/form-wizard/form-wizard-two.js') }}"></script>
        <script src="{{ asset('assets/js/form-wizard/jquery.backstretch.min.js') }}"></script>
        <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.ui.min.js') }}"></script>
        <script>
            function validateform() {
                var name = document.myform.name.val;

                if (name == null || name == "") {
                    alert("Name Can't be Blank");
                    return false;
                }
            }
            // ---------------slug-Function---------------------------
            $(document).on('keyup', '#businessname', function() {
                var name = $(this).val();
                var slug = name.toLowerCase().trim().replace(/ /g, '-');
                $("#inputslug").val(slug);
            });
            // --------------------Category-Script----------------------------------
            function childmaker(child, level = 1, html = "") {
                child = child.original;
                let dash = '';
                for (let i = 1; i <= level; i++) {
                    dash += "-";
                }
                if (child.length > 0) {
                    $.each(child, function(index, value) {
                        html += '<option value=' + value['id'] + '>' + dash + value['name'] + '</option>';
                        html += childmaker(value['children'], level + 1);
                    });
                }
                return html;
            }

            let loaddata = new Promise(function(resolve, reject) {
                let html = "";
                let level = 1;
                let id = $("#getId").val();
                let url = "{{ Route('admin.listing-form.cats', [':level', ':id']) }}";
                url = url.replace(':level', level);
                url = url.replace(':id', id);
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        $.each(response, function(index, value) {
                            html += '<option value=' + value['id'] + '>' + value['name'] +
                                '</option>';
                            html += childmaker(value['children']);
                        });
                        $("#cat-type").html(html);
                        if (html != "") {
                            resolve("Success");
                        } else {
                            reject("error");
                        }
                    }
                });
            });
            loaddata.then(
                function(value) {
                    if ($(document).find("#category")) {
                        let catval = $(document).find("#category").val();
                        let arr = $("#cat-type").children();
                        $.each(arr, function(index, val) {
                            if ($(val).val() == catval) {
                                $(val).attr("selected", "selected")
                            }
                        });
                    }
                    if ($(document).find("#packedit")) {
                        let arr = $("#package").children();
                        $.each(arr, function(index, val) {
                            $(val).removeAttr("selected");
                            if ($(val).val() == $(document).find("#packedit").val()) {
                                $(val).attr("selected", "selected")
                            }
                        });
                    }
                }
            );
            // ---------------------------------get-Country-script---------------

            function cities(cities) {
                let state_id = $(cities).val();
                let url = "{{ Route('getcities', ':id') }}";
                url = url.replace(':id', state_id);
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        let html = "";
                        let editcity = "<?php echo isset($listing) ? $listing->city : ''; ?>";
                        $.each(response, function(index, value) {
                            let ok = "";
                            if (editcity == value['name']) {
                                ok = "selected";
                            } else {
                                ok = "";
                            }
                            html += '<option ' + ok + ' value="' + value['name'] + '">' + value['name'] +
                                '</option>';
                        });
                        $("#city").html(html);
                    }
                });
            }

            function states(getcountry) {
                let country_id = $(getcountry).val();
                let url = "{{ Route('getstates', ':id') }}";
                url = url.replace(':id', country_id);
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: "JSON",
                    success: function(response) {
                        let html = "";
                        let editstate = "<?php echo isset($listing) ? $listing->state : ''; ?>";
                        $.each(response, function(index, value) {
                            let ok = "";
                            if (editstate == value['name']) {
                                ok = "selected";
                            } else {
                                ok = "";
                            }
                            html += '<option ' + ok + ' value="' + value['name'] + '">' + value['name'] +
                                '</option>';
                        });
                        $("#state").html(html);
                        cities("#state");
                    }
                });
            }

            function getcountry() {
                $.ajax({
                    type: "GET",
                    url: "{{ Route('getcountry') }}",
                    dataType: "JSON",
                    success: function(response) {
                        let html = "";
                        let editcontry = "<?php echo isset($listing) ? $listing->country : ''; ?>";
                        $.each(response, function(index, value) {
                            let ok = "";
                            if (editcontry == value['sortname']) {
                                ok = "selected";
                            } else if (editcontry == "" && "US" == value['sortname']) {
                                ok = "selected";
                            } else {
                                ok = "";
                            }
                            html += '<option ' + ok + ' value="' + value['sortname'] + '">' + value[
                                    'name'] +
                                '</option>';
                        });
                        $("#country").html(html);
                        states("#country");
                    }
                });
            }
            getcountry();
            $(document).ready(function() {
                $('#description').ckeditor();
                // --------------------- State ------------------
                $(document).on("change", "#country", function() {
                    states(this);
                });
                // ----------------------city--------------------------
                $(document).on("change", "#state", function() {
                    cities(this);
                });
                // --------------------save----------------------------------
                $(document).on("change", "#img", function() {
                    var formData = new FormData($(document).find("#form2")[0]);
                    $.ajax({
                        url: "{{ Route('admin.listing.insert') }}",
                        type: 'POST',
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            location.reload();
                        },
                    });
                });
                $(document).on("click", ".img-del", function() {
                    let ele = $(this);
                    let imgID = $(ele).data("imgid");
                    var url = "{{ Route('admin.listing.img-del', ':id') }}";
                    url = url.replace(':id', imgID);
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            $(ele).parent().parent().hide().remove();
                        },
                    });
                });
            })
        </script>
    @endpush

@endsection
