{{-- resources/views/patient-form.blade.php --}}
    @include('partial.head')

    <!-- Alpine.js for interactive tabs -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Alpine.js for interactive tabs -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="bg-[#F5F7FB] font-sans">
    @include('components.sidebar')

    <main id="mainContent" class="px-10 mt-10" x-data="{ activeTab: 'basic' }">
        <div class="space-y-6">

            {{-- Tabs Navigation --}}
            <div class="bg-[#E6EBF3] px-6 py-3 rounded-t-xl shadow-sm flex justify-center space-x-4">

                <a href="{{ route('basic') }}" 
                    class="{{ request()->routeIs('basic') 
                        ? 'bg-[#D5E8FA] text-[#0086DA] font-semibold px-6 py-3 rounded-t-lg border-b-4 border-[#0086DA] shadow-sm' 
                        : 'text-gray-600 hover:text-[#0086DA] font-medium px-6 py-3 border-b-4 border-transparent hover:border-[#0086DA]' }}">
                    Basic Information
                </a>

                <a href="{{ route('health') }}" 
                    class="{{ request()->routeIs('health') 
                        ? 'bg-[#D5E8FA] text-[#0086DA] font-semibold px-6 py-3 rounded-t-lg border-b-4 border-[#0086DA] shadow-sm' 
                        : 'text-gray-600 hover:text-[#0086DA] font-medium px-6 py-3 border-b-4 border-transparent hover:border-[#0086DA]' }}">
                    Health History
                </a>

                <a href="{{ route('dental-chart') }}" 
                    class="{{ request()->routeIs('dental-chart') 
                        ? 'bg-[#D5E8FA] text-[#0086DA] font-semibold px-6 py-3 rounded-t-lg border-b-4 border-[#0086DA] shadow-sm' 
                        : 'text-gray-600 hover:text-[#0086DA] font-medium px-6 py-3 border-b-4 border-transparent hover:border-[#0086DA]' }}">
                    Dental Chart
                </a>

                <a href="{{ route('treatment') }}" 
                    class="{{ request()->routeIs('treatment') 
                        ? 'bg-[#D5E8FA] text-[#0086DA] font-semibold px-6 py-3 rounded-t-lg border-b-4 border-[#0086DA] shadow-sm' 
                        : 'text-gray-600 hover:text-[#0086DA] font-medium px-6 py-3 border-b-4 border-transparent hover:border-[#0086DA]' }}">
                    Treatment Record
                </a>
            </div>

            {{-- Form Container --}}
            <div class="bg-[#D5E8FA] shadow-lg rounded-b-xl p-8">
                <form action="{{ route('basic.save') }}" method="POST">
                    @csrf

                    {{-- BASIC INFORMATION TAB --}}
                    <div x-show="activeTab === 'basic'" x-transition>
                        {{-- Section 1: Patient Information --}}
                        <section class="mb-8 border border-gray-300 rounded-lg overflow-hidden">
                            <div class="bg-gray-300 py-3 text-center">
                                <h2 class="text-lg font-semibold text-gray-800">Patient Information</h2>
                            </div>

                            <div class="p-6 bg-white">
                                <div class="grid grid-cols-3 gap-4">
                                    <input name="last_name" type="text" placeholder="Last Name" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="first_name" type="text" placeholder="First Name" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="middle_name" type="text" placeholder="Middle Name" class="border border-gray-400 rounded-md px-3 py-2">

                                    <input name="nickname" type="text" placeholder="Nickname" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="occupation" type="text" placeholder="Occupation" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="birthdate" type="date" class="border border-gray-400 rounded-md px-3 py-2">

                                    <input name="age" type="text" placeholder="Age" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="sex" type="text" placeholder="Sex" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="civil_status" type="text" placeholder="Civil Status" class="border border-gray-400 rounded-md px-3 py-2">

                                    <input name="home_address" type="text" placeholder="Home Address" class="col-span-2 border border-gray-400 rounded-md px-3 py-2">
                                    <input name="office_address" type="text" placeholder="Office Address" class="border border-gray-400 rounded-md px-3 py-2">

                                    <input name="home_phone" type="text" placeholder="Home Phone Number" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="office_phone" type="text" placeholder="Office Phone Number" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="mobile" type="text" placeholder="Mobile Number" class="border border-gray-400 rounded-md px-3 py-2">

                                    <input name="email" type="email" placeholder="E-mail Address" class="col-span-3 border border-gray-400 rounded-md px-3 py-2">
                                    <input name="referrer" type="text" placeholder="Whom may we thank for referring you?" class="col-span-3 border border-gray-400 rounded-md px-3 py-2">
                                </div>
                            </div>
                        </section>

                        {{-- Section 2: Emergency Contact --}}
                        <section class="mb-8 border border-gray-300 rounded-lg overflow-hidden">
                            <div class="bg-gray-300 py-3 text-center">
                                <h2 class="text-lg font-semibold text-gray-800">Person to Contact in Case of Emergency</h2>
                            </div>

                            <div class="p-6 bg-white">
                                <div class="grid grid-cols-3 gap-4">
                                    <input name="emergency_name" type="text" placeholder="Name" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="emergency_contact" type="text" placeholder="Contact Number" class="border border-gray-400 rounded-md px-3 py-2">
                                    <input name="emergency_relationship" type="text" placeholder="Relationship to Patient" class="border border-gray-400 rounded-md px-3 py-2">
                                </div>
                            </div>
                        </section>

                        {{-- Section 3: For Patients Below 18 --}}
<section class="border border-gray-300 rounded-lg overflow-hidden">
    <div class="bg-gray-300 py-3 text-center">
        <h2 class="text-lg font-semibold text-gray-800">For Patients Below 18 Years Old</h2>
    </div>

    <div class="p-6 bg-white">
        <div class="grid grid-cols-2 gap-4">
            <input name="answered_by" type="text" placeholder="Who is answering this form on behalf of the patient?" class="border border-gray-400 rounded-md px-3 py-2">
            <input name="relationship_to_patient" type="text" placeholder="Relationship to Patient" class="border border-gray-400 rounded-md px-3 py-2">

            <input name="father_name" type="text" placeholder="Father’s Name" class="border border-gray-400 rounded-md px-3 py-2">
            <input name="father_contact" type="text" placeholder="Father’s Contact Number" class="border border-gray-400 rounded-md px-3 py-2">

            <input name="mother_name" type="text" placeholder="Mother’s Name" class="border border-gray-400 rounded-md px-3 py-2">
            <input name="mother_contact" type="text" placeholder="Mother’s Contact Number" class="border border-gray-400 rounded-md px-3 py-2">

            <input name="guardian_name" type="text" placeholder="Guardian’s Name" class="border border-gray-400 rounded-md px-3 py-2">
            <input name="guardian_contact" type="text" placeholder="Guardian’s Contact Number" class="border border-gray-400 rounded-md px-3 py-2">
        </div>

        {{-- ✅ Fixed Buttons --}}
        <div class="flex justify-end space-x-3 mt-6">
            <button type="reset" class="bg-gray-300 px-6 py-2 rounded-md text-gray-700">Cancel</button>

            <!-- Next: save current basic info to localStorage and navigate to Health page -->
            <button id="btnNext" type="button" class="bg-[#0086DA] text-white px-6 py-2 rounded-md hover:bg-blue-600 transition">
                Next
            </button>
        </div>
    </div>
</section>

<!-- Save / restore script: stores the form data in localStorage when Next is clicked,
     restores it when the form loads, and keeps the draft updated on changes. -->
<script>
  (function () {
    const form = document.querySelector('form');
    if (!form) return;
    const storageKey = 'basic_info_draft';
    const nextUrl = "{{ route('health') }}";


    // Serialize form fields into an object
    function serializeForm() {
      const data = {};
      Array.from(form.elements).forEach(el => {
        if (!el.name) return;
        if (el.type === 'button' || el.type === 'submit' || el.type === 'reset') return;
        if (el.type === 'checkbox') {
          if (!data[el.name]) data[el.name] = [];
          if (el.checked) data[el.name].push(el.value || true);
        } else if (el.type === 'radio') {
          if (el.checked) data[el.name] = el.value;
        } else {
          data[el.name] = el.value;
        }
      });
      return data;
    }

    // Save draft and navigate to health page
    document.getElementById('btnNext').addEventListener('click', function () {
      try {
        const payload = serializeForm();
        localStorage.setItem(storageKey, JSON.stringify(payload));
      } catch (e) {
        console.warn('Failed to save draft:', e);
      }
      window.location.href = nextUrl;
    });

    // Keep the draft updated on change
    form.addEventListener('change', () => {
      try {
        localStorage.setItem(storageKey, JSON.stringify(serializeForm()));
      } catch (e) { /* ignore */ }
    });
  })();
</script>
</body>
</html>
