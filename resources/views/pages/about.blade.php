@extends('layouts.app')

@section('title', 'About - Md. Shadman Hasin')
@section('meta_description', 'About Md. Shadman Hasin, CSE graduate from Daffodil International University. Education, experience, skills, and projects from Faridpur to Dhaka.')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@section('content')
    @php
        $profileImage = $settings['profile_image'] ?? 'assets/images/profile.jpg';
        $profileUrl = str_starts_with($profileImage, 'http')
            ? $profileImage
            : (str_starts_with($profileImage, 'storage/') || str_starts_with($profileImage, 'assets/')
                ? asset($profileImage)
                : asset('storage/' . $profileImage));
    @endphp

    <header class="page-hero">
        <p class="section-label reveal">About</p>
        <h1 class="reveal">From Faridpur classrooms to Dhaka code.</h1>
        <p class="page-hero-lead reveal">I completed my Computer Science and Engineering degree at Daffodil International University. My thesis is defended and the final certificate is still processing. I am looking for a full-time software role where I can contribute steadily and grow with a serious team.</p>
    </header>

    <section class="about-intro">
        <div class="about-portrait reveal">
            <img src="{{ $profileUrl }}" alt="Md. Shadman Hasin">
            <div class="about-portrait-frame"></div>
        </div>
        <div class="about-copy reveal">
            <p class="about-lead">{{ $settings['about_text_1'] }}</p>
            <p>{{ $settings['about_text_2'] }}</p>
            <p>{{ $settings['about_text_3'] }}</p>

            <dl class="about-meta">
                <div>
                    <dt>Current location</dt>
                    <dd>YKSG-1, Daffodil Smart City (DSC), Birulia, Savar, Dhaka 1340</dd>
                </div>
                <div>
                    <dt>Permanent address</dt>
                    <dd>31/KA, Doctor Villa, Alauddin Khan Road, North Alipur, Faridpur Sadar, Faridpur 7800</dd>
                </div>
                <div>
                    <dt>Looking for</dt>
                    <dd>Entry / mid-level, full-time, Dhaka or Faridpur, salary negotiable</dd>
                </div>
                <div>
                    <dt>Education</dt>
                    <dd>BSc CSE, DIU, thesis defended, awaiting certificate</dd>
                </div>
                <div>
                    <dt>Phone</dt>
                    <dd>+880 1764-851551 · +880 1719-639794</dd>
                </div>
                <div>
                    <dt>Email</dt>
                    <dd>md.shadmanhasin520k82@gmail.com</dd>
                </div>
            </dl>
        </div>
    </section>

    <section class="education-block" aria-labelledby="education-title">
        <div class="reveal">
            <p class="section-label">Educational background</p>
            <h2 class="section-title" id="education-title">Academic qualification from my CV.</h2>
            <p class="section-lead">BSc, HSC, and SSC with institute, concentration, year, and duration. Details match my resume.</p>
        </div>

        <div class="edu-table-wrap reveal" role="region" aria-label="Academic qualification">
            <table class="edu-table">
                <thead>
                    <tr>
                        <th scope="col">Exam</th>
                        <th scope="col">Concentration</th>
                        <th scope="col">Institute</th>
                        <th scope="col">Status</th>
                        <th scope="col">Year</th>
                        <th scope="col">Duration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-label="Exam">Bachelor of Science (BSc)</td>
                        <td data-label="Concentration">Computer Science &amp; Engineering</td>
                        <td data-label="Institute">Daffodil International University (DIU)</td>
                        <td data-label="Status">Thesis defended<br><span class="edu-note">Awaiting final certificate</span></td>
                        <td data-label="Year">2026</td>
                        <td data-label="Duration">4 years</td>
                    </tr>
                    <tr>
                        <td data-label="Exam">HSC</td>
                        <td data-label="Concentration">Science</td>
                        <td data-label="Institute">Govt. Yasin College, Faridpur</td>
                        <td data-label="Status">Completed</td>
                        <td data-label="Year">2021</td>
                        <td data-label="Duration">2 years</td>
                    </tr>
                    <tr>
                        <td data-label="Exam">SSC</td>
                        <td data-label="Concentration">Science</td>
                        <td data-label="Institute">Faridpur Zilla School</td>
                        <td data-label="Status">Completed</td>
                        <td data-label="Year">2018</td>
                        <td data-label="Duration">2 years</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <article class="edu-spotlight reveal">
            <h3>Final-year thesis</h3>
            <p>Multimodal deep learning for early chronic kidney disease risk prediction with explainable AI. This was my DIU B.Sc. Final-Year Design Project. The thesis is defended and the certificate is still processing. Work used NHANES, MIMIC-IV, and wearable physiology signals. Research and education use only, not a clinical diagnostic tool.</p>
        </article>
    </section>

    <section class="path-block" aria-labelledby="experience-title">
        <div class="reveal">
            <p class="section-label">Professional experience</p>
            <h2 class="section-title" id="experience-title">Design roles that taught me how products get decided.</h2>
        </div>
        <div class="path-timeline" data-stagger>
            @forelse($experiences as $experience)
                <article class="path-item reveal">
                    <div class="path-year">{{ $experience->icon ?: '-' }}</div>
                    <div>
                        <h3>{{ $experience->title }}</h3>
                        <p>{{ $experience->description }}</p>
                    </div>
                </article>
            @empty
                <article class="path-item reveal">
                    <div class="path-year">Feb to Apr 2025</div>
                    <div>
                        <h3>Nexaaverse, UI/UX and Graphic Designer</h3>
                        <p>Designed UI for HR/CRM dashboards and created digital brand materials.</p>
                    </div>
                </article>
                <article class="path-item reveal">
                    <div class="path-year">Nov 2024 to Apr 2025</div>
                    <div>
                        <h3>Accenture, UI/UX and Graphic Designer (Simulation)</h3>
                        <p>Forage product-design simulation: feature iteration, wireframes, prototypes, and UX improvements.</p>
                    </div>
                </article>
            @endforelse
        </div>
    </section>

    <section class="skills-block" aria-labelledby="skills-title">
        <div class="reveal">
            <p class="section-label">Technical skills</p>
            <h2 class="section-title" id="skills-title">Tools I use when a project gets real.</h2>
            <p class="section-lead">Grouped the same way as my CV: programming, IT and security, data/AI/design, and professional habits.</p>
        </div>

        <div class="skill-groups reveal">
            <article class="skill-group">
                <h3>Programming and development</h3>
                <p>Python, C/C++, Java, JavaScript. Flutter, React, Node.js. HTML, CSS, responsive web. SQL, MySQL, MongoDB. Laravel / PHP. FastAPI. PostgreSQL / Redis.</p>
            </article>
            <article class="skill-group">
                <h3>IT and security</h3>
                <p>Information security fundamentals. Git and GitHub. MS Word, Excel, PowerPoint.</p>
            </article>
            <article class="skill-group">
                <h3>Data, AI and design</h3>
                <p>Machine learning and AI tools. Data analysis and visualization. UI/UX with Figma and Canva. Photoshop and Illustrator (basic).</p>
            </article>
            <article class="skill-group">
                <h3>Professional</h3>
                <p>OOP. Data structures and problem solving. Team collaboration and time management. Professional communication.</p>
            </article>
        </div>

        <div class="skills-list skills-list--dense" data-stagger>
            @foreach($skills as $skill)
                <article class="skill-row reveal">
                    <span class="skill-index">{{ $skill->icon }}</span>
                    <div>
                        <h3>{{ $skill->title }}</h3>
                        <p>{{ $skill->description }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="process-block" aria-labelledby="process-about-title">
        <div class="reveal">
            <p class="section-label">Work process</p>
            <h2 class="section-title" id="process-about-title">Analyze, design, develop, deploy.</h2>
            <p class="section-lead">The same four steps from my first portfolio, because that is still how I ship work.</p>
        </div>
        <div class="process-grid" data-stagger>
            <article class="process-card reveal">
                <span class="process-num">1</span>
                <h3>Analyze</h3>
                <p>Understand requirements and system architecture before writing code.</p>
            </article>
            <article class="process-card reveal">
                <span class="process-num">2</span>
                <h3>Design</h3>
                <p>Wireframe UIs and database schemas so the build stays clear.</p>
            </article>
            <article class="process-card reveal">
                <span class="process-num">3</span>
                <h3>Develop</h3>
                <p>Code frontend and backend logic, or ML and firmware when that is the job.</p>
            </article>
            <article class="process-card reveal">
                <span class="process-num">4</span>
                <h3>Deploy</h3>
                <p>Test, optimize, document, demo, and launch.</p>
            </article>
        </div>
    </section>

    <section class="training-block" aria-labelledby="training-title">
        <div class="reveal">
            <p class="section-label">Training and certifications</p>
            <h2 class="section-title" id="training-title">Courses I completed for the work in front of me.</h2>
        </div>
        <div class="training-grid" data-stagger>
            <article class="training-item reveal">
                <h3>Biomedical Data or Specimens Only Research, Basic Course</h3>
                <span>CITI Program, Online, Mar 2026 to Apr 2026</span>
            </article>
            <article class="training-item reveal">
                <h3>Introduction to Information Security</h3>
                <span>Great Learning, Online, Mar 2025 to Apr 2025, 1 Month</span>
            </article>
            <article class="training-item reveal">
                <h3>Basic Etiquette for Better Personality</h3>
                <span>GoEdu, professional communication and workplace etiquette, Online, 2025, 1 Month</span>
            </article>
        </div>
    </section>

    <section class="lang-block" aria-labelledby="lang-title">
        <div class="reveal">
            <p class="section-label">Languages</p>
            <h2 class="section-title" id="lang-title">Reading, writing, and speaking.</h2>
        </div>
        <div class="lang-table-wrap reveal">
            <table class="lang-table">
                <thead>
                    <tr>
                        <th scope="col">Language</th>
                        <th scope="col">Reading</th>
                        <th scope="col">Writing</th>
                        <th scope="col">Speaking</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bangla</td>
                        <td>High</td>
                        <td>High</td>
                        <td>High</td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>High</td>
                        <td>High</td>
                        <td>Medium</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="extra-block" aria-labelledby="extra-title">
        <div class="reveal">
            <p class="section-label">Extra-curricular</p>
            <h2 class="section-title" id="extra-title">CPC contests, debating, football, volunteering.</h2>
            <p class="section-lead">I took part in Prompt Battle (Prompt Engineering), Algorithm Contest, and Take-off Contest with DIU Computer and Programming Club (CPC). I represented school and college in debating. I played football at school, college, and university. I volunteer in academic and cultural events, and I keep learning software development, IT systems, and information security on my own.</p>
        </div>
    </section>

    <section class="personal-block" aria-labelledby="personal-title">
        <div class="reveal">
            <p class="section-label">Personal</p>
            <h2 class="section-title" id="personal-title">Details from my CV.</h2>
        </div>
        <dl class="personal-grid reveal">
            <div><dt>Full name</dt><dd>Md. Shadman Hasin</dd></div>
            <div><dt>Date of birth</dt><dd>31 December 2002</dd></div>
            <div><dt>Nationality</dt><dd>Bangladeshi</dd></div>
            <div><dt>Father</dt><dd>Md. Nurul Amin</dd></div>
            <div><dt>Mother</dt><dd>Shamima Parvin</dd></div>
            <div><dt>Marital status</dt><dd>Unmarried</dd></div>
        </dl>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/about.js') }}"></script>
@endpush
