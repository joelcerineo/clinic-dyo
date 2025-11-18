    {{-- resources/views/patient-form.blade.php --}}
    @include('partial.head')

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
<form action="{{ route('treatment.submit') }}" 
      method="POST" 
      enctype="multipart/form-data"
      class="bg-[#D5E8FA] shadow-lg rounded-b-xl p-8">

    @csrf

    <section class="border border-gray-300 rounded-lg overflow-hidden">
        <div class="bg-gray-300 py-3 text-center">
            <h2 class="text-lg font-semibold text-gray-800">Treatment Record</h2>
        </div>

        <div class="p-6 bg-white space-y-4">
            <div class="grid grid-cols-2 gap-4">
                <input type="text" 
                    name="dmd"
                    placeholder="DMD:" 
                    class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <input type="text" 
                    name="treatment_procedure"
                    placeholder="Treatment / Procedure:" 
                    class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <input type="text" 
                    name="treatment"
                    placeholder="Treatment:" 
                    class="border border-gray-400 rounded-md px-3 py-2 w-full">

                <input type="text" 
                    name="amount_charged"
                    placeholder="Amount Charged:" 
                    class="border border-gray-400 rounded-md px-3 py-2 w-full">
            </div>

            <textarea 
                name="remarks"
                placeholder="Remarks..." 
                class="border border-gray-400 rounded-md px-3 py-2 w-full h-28"></textarea>

            <div class="mt-4 flex justify-between items-center">
                <label class="text-sm font-medium">Upload File:</label>
                <input type="file" 
                    name="file_path"
                    class="border border-gray-400 rounded-md px-3 py-2 w-1/3">
            </div>

            <div class="flex justify-end space-x-3 mt-6 p-6 bg-white">
                <button @click="activeTab = 'health'" 
                    type="button"
                    class="bg-gray-300 px-6 py-2 rounded-md text-gray-700">
                    Back
                </button>

<form action="{{ route('treatment.submit') }}" method="POST" enctype="multipart/form-data"
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    <!-- Treatment fields -->
    <input type="text" name="dmd" placeholder="DMD">
    <input type="text" name="treatment_procedure" placeholder="Treatment / Procedure">
    <input type="text" name="treatment" placeholder="Treatment">
    <input type="text" name="amount_charged" placeholder="Amount Charged">
    <textarea name="remarks" placeholder="Remarks"></textarea>
    <input type="file" name="file_path">

    <button type="submit" class="bg-[#0086DA] text-white px-6 py-2 rounded-md hover:bg-blue-600 transition">
        Submit
    </button>
</form>

            </div>
        </div>
    </section>
</form>

