@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="section">
                <h4>PERSONAL DATA</h4>
                <ul>
                    <li><strong>Name:</strong> {{ $name }}</li>
                    <li><strong>Place/Date of Birth:</strong> {{ $placeOfBirth }}, {{ $dateOfBirth }}</li>
                    <li><strong>Gender:</strong> Male</li>
                    <li><strong>Health:</strong> Very Good</li>
                    <li><strong>Nationality:</strong> Indonesia</li>
                    <li><strong>Marital Status:</strong> Married</li>
                    <li><strong>Religion:</strong> Islam</li>
                    <li><strong>Full Address:</strong> Jl. Albarkah Rt/Rw 002/003, Kel. Rawa Buaya, Kec. Cengkareng, West
                        Jakarta</li>
                    <li><strong>Mobile:</strong> +6285967240162</li>
                    <li><strong>Email:</strong> yantonto88@gmail.com</li>
                </ul>
            </div>

            <div class="section">
                <h4>FORMAL EDUCATION</h4>
                <ul>
                    <li>{{ $educationPeriod }}: {{ $educationPlace }}</li>
                </ul>
            </div>

            <div class="section">
                <h4>NON FORMAL EDUCATION</h4>
                <ul>
                    <li>{{ $nonFormalEducationYear }}: {{ $nonFormalEducationTitle }}</li>
                </ul>
            </div>

            <div class="section">
                <h4>WORK EXPERIENCE</h4>
                <ul>
                    <li>Worked at Hotel Cansebu Resort as a Casual Cafetarian from January 2002 to July 2004</li>
                    <li>Worked at PT JNE Expeditions as a Cashier at the Cijerah Unit Office from September 2010 to August
                        2011</li>
                    <li>Worked at Hospitality Supplier CV.PRIBADI MANDIRI as a Cashier from November 2011 to June 2017</li>
                    <li>Worked at an Internet Cafe as a Network Operator from October 2007 to December 2017</li>
                    <li>Worked at Optic Network Partner (Telkom) as a Technician from January 2020 to January 2021</li>
                    <li>Worked at Coaxial and Optic Network (PT.Infra Solusi Indonesia) as follows:</li>
                    <ul>
                        <li>- Field Worker from February 2021 to May 2021</li>
                        <li>- Assistant Manager from June 2021 to August 2022</li>
                        <li>- PMO Digitalization from September 2022 onwards</li>
                        <li>- Job Description:</li>
                        <ul>
                            <li>Data Analyst</li>
                            <li>Data Migration</li>
                            <li>Data Validation</li>
                            <li>System Development</li>
                            <li>
                                Migration of Manual Data Input to Apk and Web-Based All Division Projects
                            </li>
                        </ul>
                    </ul>
                </ul>
            </div>

            <div class="section">
                <h4>Interests and Skills</h4>
                <ul class="interests">
                    <li>Successful development of Apps and Web-Based systems:</li>
                    <ul>
                        <li>Telegram Api: Project Planning, Reporting, Team Attendance, Taskforce Progress, and Project
                            Tracking</li>
                        <li>Android Apps: Project Task Reminder, Progress Attendance</li>
                        <li>VBA Excel, Google Sheet, Google Form for Real Team Updates (Power Query)</li>
                        <li>Web Based: WMS (Warehouse), Project Tracking</li>
                    </ul>
                    <li>Programming Languages: PHP, VBA, NODE JS, JAVA</li>
                    <li>Databases: MySQL, Google Sheet, Excel 2007 and up</li>
                    <li>Interested in new, challenging things, and reading</li>
                    <li>Award for Best Employee ICCI (Integrity, Collaboration, Customer Focus And Innovation)</li>
                    
                </ul>
            </div>

            <div class="section">
                <p>Similarity, the resume I created with truth and truth can be accounted for.<br></p>
                <p>Respectfully,<br>{{ $name }}</p>
            </div>
        </div>

        <div class="card-footer">
            Footer
        </div>

    </div>
@endsection
