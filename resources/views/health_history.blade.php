    {{-- resources/views/patient-form.blade.php --}}
    @include('partial.head')

    <!-- Alpine.js for interactive tabs -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <body class="bg-[#F5F7FB] font-sans">
    @include('components.sidebar')

    <main id="mainContent" class="px-10 mt-10">
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
    <form action="{{ route('health.save') }}" method="POST" class="bg-[#D5E8FA] shadow-lg rounded-b-xl p-8">
        @csrf 
        {{-- Laravel CSRF protection --}}

        {{-- Dental History --}}
        <section class="border border-gray-300 rounded-lg overflow-hidden mb-6">
            <div class="bg-gray-300 py-3 text-center">
                <h2 class="text-lg font-semibold text-gray-800">Dental History</h2>
            </div>

            <div class="p-6 bg-white space-y-4">
                <input type="date" name="last_dental_visit" placeholder="Date of Last Dental Visit" class="border border-gray-400 rounded-md px-3 py-2 w-full">
                <input type="text" name="last_dental_done" placeholder="What was done during your last dental visit?" class="border border-gray-400 rounded-md px-3 py-2 w-full">
                <input type="text" name="reason_today" placeholder="Reason for seeing the dentist today" class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <div class="mt-4">
                    <p class="font-medium">Have you experienced:</p>
                    <div class="grid grid-cols-2 gap-3 mt-2">
                        <label class="flex items-center space-x-2">
                            <span>a. Clicking of the jaw</span>
                            <input type="checkbox" name="experienced_clicking" value="clicking_jaw" class="accent-[#0086DA]">
                        </label>
                        <label class="flex items-center space-x-2">
                            <span>b. Pain below the ear / side of face</span>
                            <input type="checkbox" name="experienced_pain" value="pain_side_face" class="accent-[#0086DA]">
                        </label>
                        <label class="flex items-center space-x-2">
                            <span>c. Difficulty opening/closing the mouth</span>
                            <input type="checkbox" name="experienced_difficulty" value="difficulty_opening" class="accent-[#0086DA]">
                        </label>
                        <label class="flex items-center space-x-2">
                            <span>d. Locking of the jaw</span>
                            <input type="checkbox" name="experienced_locking" value="locking_jaw" class="accent-[#0086DA]">
                        </label>
                    </div>
                </div>

                <div class="space-y-3 mt-4">
                    <p>Do you clench or grind your teeth while awake or asleep?</p>
                    <label><input type="radio" name="grind" value="yes" class="accent-[#0086DA]"> Yes</label>
                    <label><input type="radio" name="grind" value="no" class="accent-[#0086DA]"> No</label>

                    <p>Have you ever had a bad experience in the dental office?</p>
                    <label><input type="radio" name="badexp" value="yes" class="accent-[#0086DA]"> Yes</label>
                    <label><input type="radio" name="badexp" value="no" class="accent-[#0086DA]"> No</label>

                    <p>Do you feel nervous about having dental treatment?</p>
                    <label><input type="radio" name="nervous" value="yes" class="accent-[#0086DA]"> Yes</label>
                    <label><input type="radio" name="nervous" value="no" class="accent-[#0086DA]"> No</label>

                    <input type="text" name="concern" placeholder="If YES, what is your concern?" class="border border-gray-400 rounded-md px-3 py-2 w-full">
                </div>
            </div>
        </section>

        {{-- Medical History --}}
        <section class="border border-gray-300 rounded-lg overflow-hidden">
            <div class="bg-gray-300 py-3 text-center">
                <h2 class="text-lg font-semibold text-gray-800">Medical History</h2>
            </div>

            <div class="p-6 bg-white space-y-3">
                <label>1. Are you being treated for any medical condition at present or within the past 2 years?</label>
                <input type="text" name="current_medical_treatment" class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <label>2. Have you ever been hospitalized?</label>
                <input type="text" name="ever_hospitalized" class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <label>3. Have you ever had any serious illness or operation?</label>
                <input type="text" name="serious_illness_operation" class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <label>4. Are you taking any medications right now?</label>
                <input type="text" name="current_medications" class="border border-gray-400 rounded-md px-3 py-2 w-full">
            </div>
        </section>

  {{-- Buttons --}}
<div class="flex justify-end space-x-3 mt-6">
    <!-- Back button goes to Basic Info -->
    <a href="{{ route('basic') }}" class="bg-gray-300 px-6 py-2 rounded-md text-gray-700 hover:bg-gray-400 transition">
        Back
    </a>

    <!-- Next button goes to Dental Chart -->
    <button type="button" id="btnNext" class="bg-[#0086DA] text-white px-6 py-2 rounded-md hover:bg-blue-600 transition">
        Next
    </button>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnNext = document.getElementById('btnNext');

    // Correct way to pass route URL
    const dentalChartUrl = {!! json_encode(route('dental-chart')) !!};

    btnNext.addEventListener('click', () => {
        const healthData = {
            lastDentalVisit: document.querySelector('input[name="last_dental_visit"]')?.value || '',
            lastDentalDone: document.querySelector('input[name="last_dental_done"]')?.value || '',
            reasonToday: document.querySelector('input[name="reason_today"]')?.value || '',
            experiencedClicking: document.querySelector('input[name="experienced_clicking"]')?.checked || false,
            experiencedPain: document.querySelector('input[name="experienced_pain"]')?.checked || false,
            experiencedDifficulty: document.querySelector('input[name="experienced_difficulty"]')?.checked || false,
            experiencedLocking: document.querySelector('input[name="experienced_locking"]')?.checked || false,
            grind: document.querySelector('input[name="grind"]:checked')?.value || '',
            badExp: document.querySelector('input[name="badexp"]:checked')?.value || '',
            nervous: document.querySelector('input[name="nervous"]:checked')?.value || '',
            concern: document.querySelector('input[name="concern"]')?.value || '',
            currentMedicalTreatment: document.querySelector('input[name="current_medical_treatment"]')?.value || '',
            everHospitalized: document.querySelector('input[name="ever_hospitalized"]')?.value || '',
            seriousIllnessOperation: document.querySelector('input[name="serious_illness_operation"]')?.value || '',
            currentMedications: document.querySelector('input[name="current_medications"]')?.value || ''
        };

        localStorage.setItem('healthData', JSON.stringify(healthData));

        window.location.href = dentalChartUrl;
    });
});
</script>

</main>
</body>
</html>
