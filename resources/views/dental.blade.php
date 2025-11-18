@include('partial.head')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<body class="bg-[#F5F7FB] font-sans">
@include('components.sidebar')

<main id="mainContent" class="px-10 mt-10">
    <div class="space-y-6">

        {{-- Tabs --}}
        <div class="bg-[#E6EBF3] px-6 py-3 rounded-t-xl shadow-sm flex justify-center space-x-4">
            <a href="{{ route('basic') }}" class="tab {{ request()->routeIs('basic') ? 'active' : '' }}">Basic Information</a>
            <a href="{{ route('health') }}" class="tab {{ request()->routeIs('health') ? 'active' : '' }}">Health History</a>
            <a href="{{ route('dental') }}" class="tab {{ request()->routeIs('dental') ? 'active' : '' }}">Dental Chart</a>
            <a href="{{ route('treatment') }}" class="tab {{ request()->routeIs('treatment') ? 'active' : '' }}">Treatment Record</a>
        </div>

        {{-- Dental Chart --}}
        <form  method="POST" class="bg-[#D5E8FA] shadow-lg rounded-b-xl p-8" 
            x-data="{ mode: 'adult', selectedColor: '#FF0000' }">
            @csrf

            <h2 class="text-center text-xl font-bold mb-6">TOOTH STATUS</h2>

            {{-- Mode Switch --}}
            <div class="flex justify-center mb-6 space-x-6">
                <label class="flex items-center space-x-2">
                    <input type="radio" value="adult" x-model="mode" checked>
                    <span class="font-semibold">Adult</span>
                </label>
                <label class="flex items-center space-x-2">
                    <input type="radio" value="toddler" x-model="mode">
                    <span class="font-semibold">Toddler</span>
                </label>
            </div>

            {{-- Tooth Grid --}}
            <div class="flex flex-col items-center bg-white rounded-lg p-6 border border-gray-300">
                {{-- Upper Teeth --}}
                <div class="flex justify-center mb-3">
                    <template x-for="tooth in 16" :key="'upper' + tooth">
                        <div 
                            class="w-10 h-10 m-0.5 border border-gray-300 rounded-md flex items-center justify-center cursor-pointer"
                            @click="$event.target.style.backgroundColor = selectedColor"
                            x-text="tooth + 11">
                        </div>
                    </template>
                </div>
                <div class="w-full border-t border-gray-400 mb-3"></div>
                {{-- Lower Teeth --}}
                <div class="flex justify-center">
                    <template x-for="tooth in 16" :key="'lower' + tooth">
                        <div 
                            class="w-10 h-10 m-0.5 border border-gray-300 rounded-md flex items-center justify-center cursor-pointer"
                            @click="$event.target.style.backgroundColor = selectedColor"
                            x-text="tooth + 41">
                        </div>
                    </template>
                </div>
            </div>

            {{-- Color Palette --}}
            <div class="flex justify-center mt-6 space-x-3">
                <template x-for="color in ['#FF0000','#0000FF','#00FF00','#FFA500','#800080']">
                    <div :style="`background-color: ${color}`" 
                        class="w-8 h-8 rounded-full cursor-pointer border-2 border-gray-300"
                        @click="selectedColor = color">
                    </div>
                </template>
            </div>

            {{-- Legend --}}
            <div class="mt-10 bg-[#E6EBF3] rounded-lg p-6">
                <h3 class="font-bold text-center mb-3">Dental Chart Legend</h3>
                <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-2 text-sm">
                    <div>CC - Chief Complaint</div>
                    <div>TF - Temporary Filling</div>
                    <div>Po - Pontic</div>
                    <div>LC - Composite Filling</div>
                    <div>Am - Amalgam Filling</div>
                    <div>GIC - Glass Ionomer</div>
                    <div>Ab - Abrasion</div>
                    <div>SSC - Stainless Steel Crown</div>
                    <div>FT - Fractured Tooth</div>
                    <div>NV - Non-Vital Tooth</div>
                </div>
            </div>

            {{-- Notes --}}
            <div class="mt-8">
                <label class="block font-semibold mb-2">Notes</label>
                <textarea name="notes" rows="3" class="w-full p-2 border border-gray-300 rounded-lg"></textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end space-x-3 mt-6">
                <a href="{{ route('basic') }}" class="bg-gray-300 px-6 py-2 rounded-md text-gray-700">Back</a>
                <button type="submit" class="bg-[#0086DA] text-white px-6 py-2 rounded-md hover:bg-blue-600 transition">Submit</button>
            </div>

        </form>
    </div>
</main>
</body>
</html>

<style>
.tab { @apply text-gray-600 hover:text-[#0086DA] font-medium px-6 py-3 border-b-4 border-transparent hover:border-[#0086DA]; }
.tab.active { @apply bg-[#D5E8FA] text-[#0086DA] font-semibold border-b-4 border-[#0086DA] shadow-sm; }
</style>
