@extends('layouts.user')
@section('content')

<!-- Dashboard Content -->
<div class="utf-dashboard-content-container-aera" data-simplebar>
    <div id="dashboard-titlebar" class="utf-dashboard-headline-item">
        <div class="row">
            <div class="col-xl-12">
                <h3>Manage Jobs Post</h3>
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="index-1.html">Home</a></li>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li>Manage Jobs Post</li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="utf-dashboard-content-inner-aera">
        <div class="row">
            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>General Information</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>First Name</h5>
                                    <input type="text" class="utf-with-border" placeholder="First Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Last Name</h5>
                                    <input type="text" class="utf-with-border" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Email Address</h5>
                                    <input type="email" class="utf-with-border" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Phone Number</h5>
                                    <input type="text" class="utf-with-border" placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Designation</h5>
                                    <input type="text" class="utf-with-border" placeholder="Designation">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Job Category</h5>
                                    <select class="selectpicker utf-with-border" data-size="7" title="Select Category">
                                        <option>Accounting and Finance</option>
                                        <option>Clerical & Data Entry</option>
                                        <option>Counseling</option>
                                        <option>Court Administration</option>
                                        <option>Human Resources</option>
                                        <option>Investigative</option>
                                        <option>IT and Computers</option>
                                        <option>Law Enforcement</option>
                                        <option>Management</option>
                                        <option>Miscellaneous</option>
                                        <option>Public Relations</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Experience</h5>
                                    <select class="selectpicker utf-with-border" data-value="0 To 6 Years" data-size="7"
                                        title="Select Experience">
                                        <option>1 Year</option>
                                        <option>1.5 Year</option>
                                        <option>2 Year</option>
                                        <option>2.5 Year</option>
                                        <option>3 Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Job Type</h5>
                                    <select class="selectpicker utf-with-border" data-size="7" title="Select Job Type">
                                        <option>Full Time Jobs</option>
                                        <option>Part Time Jobs</option>
                                        <option>Work Form Home</option>
                                        <option>Internship Jobs</option>
                                        <option>Temporary Jobs</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Location</h5>
                                    <div class="utf-input-with-icon">
                                        <input class="utf-with-border" type="text" placeholder="Type Address">
                                        <i class="icon-material-outline-location-on"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Monthly Salary</h5>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-input-with-icon">
                                                <input class="utf-with-border" type="text" placeholder="Min Salary">
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-6">
                                            <div class="utf-input-with-icon">
                                                <input class="utf-with-border" type="text" placeholder="Max Salary">
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Job Skills <i class="help-icon" data-tippy-placement="top"
                                            title="Maximum of 6 Skills"></i></h5>
                                    <div class="keywords-container">
                                        <div class="keyword-input-container">
                                            <input type="text" class="keyword-input utf-with-border"
                                                placeholder="CSS, Photoshop, Js, Bootstrap" />
                                            <button class="keyword-input-button ripple-effect"><i
                                                    class="icon-material-outline-add"></i></button>
                                        </div>
                                        <div class="keywords-list">
                                            <!-- keywords go here -->
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Upload Resume</h5>
                                    <div class="uploadButton margin-top-15 margin-bottom-30">
                                        <input class="uploadButton-input" type="file" accept="image/*, application/pdf"
                                            id="upload" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Upload
                                            Resume</label>
                                        <span class="uploadButton-file-name">Upload Resume (Docx, Doc, PDF) File.</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Career Description</h5>
                                    <textarea cols="40" rows="2" class="utf-with-border"
                                        placeholder="Career Description..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>Personal Detail & Address</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field datepicker">
                                    <h5>Birth Date</h5>
                                    <input class="utf-with-border" type="date">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Address</h5>
                                    <input type="text" class="utf-with-border" placeholder="Address">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>City</h5>
                                    <select class="selectpicker utf-with-border" data-size="7" title="Select City">
                                        <option>Allahabad</option>
                                        <option>Faizabad</option>
                                        <option>Sultanpur</option>
                                        <option>Pratapgarh</option>
                                        <option>Basti</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>State</h5>
                                    <select class="selectpicker utf-with-border" data-size="7" title="Select State">
                                        <option>Allahabad</option>
                                        <option>Faizabad</option>
                                        <option>Sultanpur</option>
                                        <option>Pratapgarh</option>
                                        <option>Basti</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Country</h5>
                                    <select class="selectpicker utf-with-border" data-size="7" title="Select Country">
                                        <option>Allahabad</option>
                                        <option>Faizabad</option>
                                        <option>Sultanpur</option>
                                        <option>Pratapgarh</option>
                                        <option>Basti</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Zip Code</h5>
                                    <input type="text" class="utf-with-border" placeholder="000000">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Father Name</h5>
                                    <input type="text" class="utf-with-border" placeholder="Father Name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6">
                                <div class="utf-submit-field">
                                    <h5>Hobbies(With Comma)</h5>
                                    <input type="text" class="utf-with-border" placeholder="Hobbies(With Comma)">
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5>Job Description</h5>
                                    <textarea cols="20" rows="2" class="utf-with-border"
                                        placeholder="Job Description..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="dashboard-box">
                    <div class="headline">
                        <h3>Social Accounts</h3>
                    </div>
                    <div class="content with-padding padding-bottom-10">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5><i class="icon-brand-facebook"></i> Facebook</h5>
                                    <input type="text" class="utf-with-border" placeholder="https://www.facebook.com/">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5><i class="icon-brand-twitter"></i> Twitter</h5>
                                    <input type="text" class="utf-with-border" placeholder="https://twitter.com/">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5><i class="icon-brand-linkedin"></i> LinkedIn</h5>
                                    <input type="text" class="utf-with-border" placeholder="https://www.linkedin.com/">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5><i class="icon-brand-google"></i> Google +</h5>
                                    <input type="text" class="utf-with-border" placeholder="https://www.google.com/">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5><i class="icon-brand-pinterest"></i> Pinterest</h5>
                                    <input type="text" class="utf-with-border" placeholder="https://www.pinterest.com/">
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-12">
                                <div class="utf-submit-field">
                                    <h5><i class="icon-feather-instagram"></i> Instagram</h5>
                                    <input type="text" class="utf-with-border" placeholder="https://www.instagram.com/">
                                </div>
                            </div>

                            <div class="utf-centered-button">
                                <a href="javascript:void(0);"
                                    class="button utf-ripple-effect-dark utf-button-sliding-icon margin-top-0">Submit
                                    Jobs <i class="icon-feather-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <div class="utf-dashboard-footer-spacer-aera"></div>
        <div class="utf-small-footer margin-top-15">
            <div class="utf-small-footer-copyrights">Copyright &copy; 2021 All Rights Reserved.</div>
        </div>
    </div>
</div>
<!-- Dashboard Content / End -->
@endsection