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
                <form action="{{ ('dental-chart.store') }}" method="POST">
                    @csrf
                <body class="bg-sky-50">
    <div id="app" class="min-h-screen flex flex-col items-center p-4 font-sans">
    </div>

    <script type="module">
        // --- DATA AND CONSTANTS ---
        const PatientType = { Adult: 'Adult', Toddler: 'Toddler' };
        const ToothType = { Incisor: 'Incisor', Canine: 'Canine', Premolar: 'Premolar', Molar: 'Molar', DeciduousIncisor: 'DeciduousIncisor', DeciduousCanine: 'DeciduousCanine', DeciduousMolar: 'DeciduousMolar' };
        const ToothSurface = { Buccal: 'B', Lingual: 'L', Mesial: 'M', Distal: 'D', Occlusal: 'O' };
        const ToothStatus = { Healthy: 'Healthy', NeedsAttention: 'NeedsAttention', ExistingWork: 'ExistingWork', Missing: 'Missing', Unerupted: 'Unerupted' };

        const ADULT_TEETH = [
            { id: 18, type: ToothType.Molar, position: 'upper' }, { id: 17, type: ToothType.Molar, position: 'upper' }, { id: 16, type: ToothType.Molar, position: 'upper' }, { id: 15, type: ToothType.Premolar, position: 'upper' }, { id: 14, type: ToothType.Premolar, position: 'upper' }, { id: 13, type: ToothType.Canine, position: 'upper' }, { id: 12, type: ToothType.Incisor, position: 'upper' }, { id: 11, type: ToothType.Incisor, position: 'upper' },
            { id: 21, type: ToothType.Incisor, position: 'upper' }, { id: 22, type: ToothType.Incisor, position: 'upper' }, { id: 23, type: ToothType.Canine, position: 'upper' }, { id: 24, type: ToothType.Premolar, position: 'upper' }, { id: 25, type: ToothType.Premolar, position: 'upper' }, { id: 26, type: ToothType.Molar, position: 'upper' }, { id: 27, type: ToothType.Molar, position: 'upper' }, { id: 28, type: ToothType.Molar, position: 'upper' },
            { id: 31, type: ToothType.Incisor, position: 'lower' }, { id: 32, type: ToothType.Incisor, position: 'lower' }, { id: 33, type: ToothType.Canine, position: 'lower' }, { id: 34, type: ToothType.Premolar, position: 'lower' }, { id: 35, type: ToothType.Premolar, position: 'lower' }, { id: 36, type: ToothType.Molar, position: 'lower' }, { id: 37, type: ToothType.Molar, position: 'lower' }, { id: 38, type: ToothType.Molar, position: 'lower' },
            { id: 48, type: ToothType.Molar, position: 'lower' }, { id: 47, type: ToothType.Molar, position: 'lower' }, { id: 46, type: ToothType.Molar, position: 'lower' }, { id: 45, type: ToothType.Premolar, position: 'lower' }, { id: 44, type: ToothType.Premolar, position: 'lower' }, { id: 43, type: ToothType.Canine, position: 'lower' }, { id: 42, type: ToothType.Incisor, position: 'lower' }, { id: 41, type: ToothType.Incisor, position: 'lower' },
        ];
        const TODDLER_TEETH = [
            { id: 55, type: ToothType.DeciduousMolar, position: 'upper' }, { id: 54, type: ToothType.DeciduousMolar, position: 'upper' }, { id: 53, type: ToothType.DeciduousCanine, position: 'upper' }, { id: 52, type: ToothType.DeciduousIncisor, position: 'upper' }, { id: 51, type: ToothType.DeciduousIncisor, position: 'upper' },
            { id: 61, type: ToothType.DeciduousIncisor, position: 'upper' }, { id: 62, type: ToothType.DeciduousIncisor, position: 'upper' }, { id: 63, type: ToothType.DeciduousCanine, position: 'upper' }, { id: 64, type: ToothType.DeciduousMolar, position: 'upper' }, { id: 65, type: ToothType.DeciduousMolar, position: 'upper' },
            { id: 71, type: ToothType.DeciduousIncisor, position: 'lower' }, { id: 72, type: ToothType.DeciduousIncisor, position: 'lower' }, { id: 73, type: ToothType.DeciduousCanine, position: 'lower' }, { id: 74, type: ToothType.DeciduousMolar, position: 'lower' }, { id: 75, type: ToothType.DeciduousMolar, position: 'lower' },
            { id: 85, type: ToothType.DeciduousMolar, position: 'lower' }, { id: 84, type: ToothType.DeciduousMolar, position: 'lower' }, { id: 83, type: ToothType.DeciduousCanine, position: 'lower' }, { id: 82, type: ToothType.DeciduousIncisor, position: 'lower' }, { id: 81, type: ToothType.DeciduousIncisor, position: 'lower' },
        ];
        const STATUS_COLORS = {
            [ToothStatus.Healthy]: 'fill-transparent', [ToothStatus.NeedsAttention]: 'fill-red-500', [ToothStatus.ExistingWork]: 'fill-blue-500', [ToothStatus.Missing]: 'fill-gray-400', [ToothStatus.Unerupted]: 'fill-yellow-400',
        };
        const LEGEND_DATA = [
            { label: 'chief complaint', abbr: 'CC', color: 'text-red-600 bg-red-100' }, { label: 'temporary filling', abbr: 'TF', color: 'text-yellow-600 bg-yellow-100' }, { label: 'pontic / artificial tooth', abbr: 'Po', color: 'text-purple-600 bg-purple-100' }, { label: 'drifting tooth', abbr: '↑↓', color: 'text-blue-600 bg-blue-100' }, { label: 'composite filling', abbr: 'CF', color: 'text-green-600 bg-green-100' }, { label: 'maryland bridge wing', abbr: 'MB', color: 'text-indigo-600 bg-indigo-100' }, { label: 'missing / extracted', abbr: '---', color: 'text-white font-extrabold bg-gradient-to-r from-red-500 to-gray-400' }, { label: 'amalgam filling', abbr: 'Am', color: 'text-gray-600 bg-gray-200' }, { label: 'veneer / laminate', abbr: 'V', color: 'text-pink-600 bg-pink-100' }, { label: 'unerupted', abbr: 'U', color: 'text-yellow-600 bg-yellow-100' }, { label: 'glass ionomer cement filling', abbr: 'GIC', color: 'text-teal-600 bg-teal-100' }, { label: 'dislodged restoration', abbr: 'DS', color: 'text-orange-600 bg-orange-100' }, { label: 'caries', abbr: 'C', color: 'text-red-600 bg-red-100' }, { label: 'inlay / onlay', abbr: 'IN/ON', color: 'text-cyan-600 bg-cyan-100' }, { label: 'attrition', abbr: 'At', color: 'text-amber-600 bg-amber-100' }, { label: 'incident caries', abbr: 'O', color: 'text-red-600 bg-red-100' }, { label: 'sealant', abbr: 'S', color: 'text-lime-600 bg-lime-100' }, { label: 'root canal treated tooth', abbr: 'RCT', color: 'text-rose-600 bg-rose-100' }, { label: 'deep series', abbr: 'DS', color: 'text-red-600 bg-red-100' }, { label: 'stainless steel crown', abbr: 'SSC', color: 'text-slate-600 bg-slate-200' }, { label: 'fractured tooth', abbr: 'FT', color: 'text-red-600 bg-red-100' }, { label: 'caries with pulp involvement', abbr: 'CP', color: 'text-red-600 bg-red-100' }, { label: 'acrylic jacket crown / bridge', abbr: 'AC/AB', color: 'text-fuchsia-600 bg-fuchsia-100' }, { label: 'root fragment', abbr: 'RF', color: 'text-stone-600 bg-stone-100' }, { label: '1st degree mobility', abbr: '1°', color: 'text-blue-600 bg-blue-100' }, { label: 'full porcelain crown / bridge', abbr: 'FPC', color: 'text-sky-600 bg-sky-100' }, { label: 'impacted tooth', abbr: 'Imp', color: 'text-yellow-600 bg-yellow-100' }, { label: '2nd degree mobility', abbr: '2°', color: 'text-blue-600 bg-blue-100' }, { label: 'porcelain fused to metal crown / bridge', abbr: 'PFM', color: 'text-violet-600 bg-violet-100' }, { label: 'for extraction', abbr: 'X', color: 'text-red-600 bg-red-100' }, { label: '3rd degree mobility', abbr: '3°', color: 'text-blue-600 bg-blue-100' }, { label: 'abutment tooth', abbr: 'Ab', color: 'text-emerald-600 bg-emerald-100' }, { label: 'non-vital tooth', abbr: 'NV', color: 'text-gray-600 bg-gray-100' },
        ];
        
        // --- APPLICATION STATE ---
        let state = {
            patientType: PatientType.Adult,
            toothStatuses: {},
            selectedStatus: ToothStatus.NeedsAttention,
            toothNotes: {},
            selectedLegendAbbr: null,
            oralExamData: { oralHygiene: '', calculus: '', gingiva: '', stains: '', completeDenture: '', partialDenture: '' },
            notesData: { comments: '', treatmentPlan: '' }
        };

        // --- RENDER FUNCTIONS ---
        const getToothPath = (type) => {
            switch (type) {
                case ToothType.Molar: case ToothType.DeciduousMolar: return `<path d="M20,35 C20,20 80,20 80,35 L80,65 C85,80 70,90 65,80 L60,65 L40,65 L35,80 C30,90 15,80 20,65 Z" />`;
                case ToothType.Premolar: return `<path d="M30,30 C30,20 70,20 70,30 L70,60 C75,75 60,85 55,75 L50,60 L45,75 C40,85 25,75 30,60 Z" />`;
                case ToothType.Canine: case ToothType.DeciduousCanine: return `<path d="M35,30 C35,20 65,20 65,30 L60,50 L50,85 L40,50 Z" />`;
                case ToothType.Incisor: case ToothType.DeciduousIncisor: default: return `<path d="M30,30 C30,25 70,25 70,30 L70,75 C70,80 30,80 30,75 Z" />`;
            }
        };

        const renderTooth = (tooth, status = {}, transform = '', interactive = false) => {
            if (interactive) {
                const getStatusColor = (surface) => status[surface] ? STATUS_COLORS[status[surface]] : STATUS_COLORS[ToothStatus.Healthy];
                return `
                    <div class="w-12 h-8 flex items-center justify-center" data-tooth-id="${tooth.id}" data-interactive="true">
                        <svg viewBox="0 0 100 100" class="w-full h-full">
                            <g class="cursor-pointer stroke-green-700 stroke-2 group">
                                <path d="M 20 20 L 80 20 L 80 80 L 20 80 Z" class="fill-transparent" />
                                <path d="M 35 35 L 65 35 L 65 65 L 35 65 Z" class="${getStatusColor(ToothSurface.Occlusal)} group-hover:opacity-80" data-surface="${ToothSurface.Occlusal}" />
                                <path d="M 20 20 L 80 20 L 65 35 L 35 35 Z" class="${getStatusColor(ToothSurface.Buccal)} group-hover:opacity-80" data-surface="${ToothSurface.Buccal}" />
                                <path d="M 20 80 L 80 80 L 65 65 L 35 65 Z" class="${getStatusColor(ToothSurface.Lingual)} group-hover:opacity-80" data-surface="${ToothSurface.Lingual}" />
                                <path d="M 20 20 L 35 35 L 35 65 L 20 80 Z" class="${getStatusColor(ToothSurface.Mesial)} group-hover:opacity-80" data-surface="${ToothSurface.Mesial}" />
                                <path d="M 80 20 L 65 35 L 65 65 L 80 80 Z" class="${getStatusColor(ToothSurface.Distal)} group-hover:opacity-80" data-surface="${ToothSurface.Distal}" />
                            </g>
                        </svg>
                    </div>`;
            }

            const statuses = Object.values(status);
            const isMissing = statuses.length > 0 && statuses.every(s => s === ToothStatus.Missing);
            const isUnerupted = statuses.length > 0 && statuses.every(s => s === ToothStatus.Unerupted);

            if (isMissing) return `<div class="w-12 h-8"></div>`;

            const baseClasses = `stroke-green-700 stroke-2 ${isUnerupted ? 'fill-yellow-200 opacity-70' : 'fill-white'}`;
            return `
                <div class="w-12 h-8 flex items-center justify-center">
                   <svg viewBox="0 0 100 100" class="w-full h-full" style="transform: ${transform};">
                      <g class="${baseClasses}">
                        ${getToothPath(tooth.type)}
                      </g>
                    </svg>
                </div>`;
        };
        
        const renderAnnotationSection = (teeth) => {
            const renderInputs = (rowIndex) => teeth.map(tooth => `
                <input
                    type="text"
                    aria-label="Note ${rowIndex + 1} for tooth ${tooth.id}"
                    class="w-12 h-6 bg-slate-200 border border-slate-400 text-center text-xs p-0 focus:outline-none focus:ring-1 focus:ring-blue-500 rounded-sm ${state.selectedLegendAbbr ? 'cursor-copy' : 'cursor-text'}"
                    value="${state.toothNotes[tooth.id]?.[rowIndex] || ''}"
                    data-tooth-id="${tooth.id}"
                    data-note-index="${rowIndex}"
                    maxlength="3"
                />`
            ).join('');

            return `
                <div class="flex flex-col items-center gap-1">
                    <div class="flex justify-center gap-1">
                        ${teeth.map(tooth => `<div class="w-12 h-6 flex items-center justify-center text-xs text-slate-600 font-medium">${tooth.id}</div>`).join('')}
                    </div>
                    <div class="flex justify-center gap-1">${renderInputs(0)}</div>
                    <div class="flex justify-center gap-1">${renderInputs(1)}</div>
                    <div class="flex justify-center gap-1">${renderInputs(2)}</div>
                </div>`;
        };

        const renderDentalChart = () => {
            const teethData = state.patientType === PatientType.Adult ? ADULT_TEETH : TODDLER_TEETH;
            const quadrantSorter = (a, b) => {
                const getQuadrant = id => Math.floor(id / 10);
                const getPosition = id => id % 10;
                const quadA = getQuadrant(a.id), quadB = getQuadrant(b.id);
                if (quadA !== quadB) return quadA - quadB;
                if ([1, 4, 5, 8].includes(quadA)) return getPosition(b.id) - getPosition(a.id);
                return getPosition(a.id) - getPosition(b.id);
            };

            const upperTeeth = teethData.filter(t => t.position === 'upper').sort(quadrantSorter);
            const lowerTeeth = teethData.filter(t => t.position === 'lower').sort(quadrantSorter);

            const renderToothRow = (teeth, isLower = false) => teeth.map(tooth => renderTooth(tooth, state.toothStatuses[tooth.id], isLower ? 'scale-y-[-1]' : '')).join('');
            const renderInteractiveRow = (teeth) => teeth.map(tooth => renderTooth(tooth, state.toothStatuses[tooth.id], '', true)).join('');

            return `
                <div class="flex flex-col gap-2 min-w-[900px]">
                    ${renderAnnotationSection(upperTeeth)}
                    <div class="flex justify-center items-end gap-1">${renderToothRow(upperTeeth, false)}</div>
                    <div class="flex justify-center items-center gap-1">${renderInteractiveRow(upperTeeth)}</div>
                    <div class="w-full h-px bg-slate-300 my-2"></div>
                    <div class="flex justify-center items-center gap-1">${renderInteractiveRow(lowerTeeth)}</div>
                    <div class="flex justify-center items-end gap-1">${renderToothRow(lowerTeeth, true)}</div>
                    ${renderAnnotationSection(lowerTeeth)}
                </div>`;
        };

        const renderApp = () => {
            const statusOptions = [
                { status: ToothStatus.NeedsAttention, label: 'Needs Attention' }, { status: ToothStatus.ExistingWork, label: 'Existing Work' }, { status: ToothStatus.Missing, label: 'Missing' }, { status: ToothStatus.Unerupted, label: 'Unerupted' },
            ];

            const formFields = [
                { name: 'oralHygiene', label: 'Oral Hygiene Status' }, { name: 'calculus', label: 'Calculus Deposits' }, { name: 'gingiva', label: 'Gingiva' }, { name: 'stains', label: 'Stains' }, { name: 'completeDenture', label: 'Complete Denture' }, { name: 'partialDenture', label: 'Partial Denture' },
            ];

            document.getElementById('app').innerHTML = `
                <div class="w-full max-w-7xl mx-auto">
                    <header class="text-center mb-6">
                        <h1 class="text-3xl font-bold text-slate-700">Dental Chart</h1>
                        <p class="text-slate-500">Select a status, then click on a tooth surface to mark it.</p>
                    </header>
                    <main>
                        <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8">
                            <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
                                <!-- Toggle Switch -->
                                <div id="toggle-switch" class="flex items-center space-x-2 cursor-pointer bg-slate-200 rounded-full p-1">
                                    <span class="px-4 py-1 rounded-full text-sm font-semibold transition-colors duration-300 ${state.patientType === PatientType.Adult ? 'bg-white text-blue-600 shadow' : 'text-slate-600'}" data-patient-type="${PatientType.Adult}">Adult</span>
                                    <span class="px-4 py-1 rounded-full text-sm font-semibold transition-colors duration-300 ${state.patientType === PatientType.Toddler ? 'bg-white text-blue-600 shadow' : 'text-slate-600'}" data-patient-type="${PatientType.Toddler}">Toddler</span>
                                </div>
                                <!-- Legend -->
                                <div id="legend-buttons" class="flex items-center justify-center gap-4 flex-wrap">
                                    ${statusOptions.map(({ status, label }) => `
                                        <button data-status="${status}" class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm transition-all duration-200 ${state.selectedStatus === status ? 'ring-2 ring-blue-500 ring-offset-2 bg-slate-50' : 'hover:bg-slate-100'}">
                                            <span class="w-4 h-4 rounded-full ${STATUS_COLORS[status].replace('fill-', 'bg-')}"></span>
                                            <span class="font-medium text-slate-700">${label}</span>
                                        </button>
                                    `).join('')}
                                </div>
                                <button id="clear-chart-btn" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">Clear Chart</button>
                            </div>
                            <div id="dental-chart-container" class="overflow-x-auto">
                                ${renderDentalChart()}
                            </div>
                        </div>
                        <div class="mt-8 space-y-8">
                            <!-- Dental Chart Legend -->
                            <div class="bg-white rounded-2xl shadow-lg p-6">
                                <h2 class="text-xl font-bold text-center text-slate-700 mb-4">Dental Chart Legend</h2>
                                <div id="dental-chart-legend" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">
                                    ${LEGEND_DATA.map(item => `
                                        <button data-abbr="${item.abbr}" class="flex justify-between items-center w-full p-2 border border-slate-200 rounded-md text-sm text-left transition-all duration-200 focus:outline-none ${state.selectedLegendAbbr === item.abbr ? 'ring-2 ring-blue-500 ring-offset-1' : 'hover:bg-slate-50'}">
                                            <span class="text-slate-600">${item.label}</span>
                                            <span class="px-2 py-0.5 rounded-md font-bold text-xs ${item.color}">${item.abbr}</span>
                                        </button>
                                    `).join('')}
                                </div>
                            </div>
                            <!-- Oral Exam -->
                            <div class="bg-white rounded-2xl shadow-lg p-6">
                                <h2 class="text-xl font-bold text-center text-slate-700 mb-6">Oral Exam</h2>
                                <div id="oral-exam-form" class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-4">
                                    ${formFields.map(field => `
                                        <div>
                                            <label for="${field.name}" class="block text-sm font-medium text-slate-600 mb-1">${field.label}</label>
                                            <select id="${field.name}" name="${field.name}" class="w-full p-2 border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">
                                                <option value="" ${!state.oralExamData[field.name] ? 'selected' : ''} disabled>Select...</option>
                                                <option value="good" ${state.oralExamData[field.name] === 'good' ? 'selected' : ''}>Good</option>
                                                <option value="fair" ${state.oralExamData[field.name] === 'fair' ? 'selected' : ''}>Fair</option>
                                                <option value="poor" ${state.oralExamData[field.name] === 'poor' ? 'selected' : ''}>Poor</option>
                                            </select>
                                        </div>`).join('')}
                                </div>
                            </div>
                            <!-- Notes -->
                            <div class="bg-white rounded-2xl shadow-lg p-6">
                                <h2 class="text-xl font-bold text-center text-slate-700 mb-6">Notes</h2>
                                <div id="notes-form" class="space-y-4">
                                    <div>
                                        <label for="comments" class="block text-sm font-medium text-slate-600 mb-1">Comments/Notes</label>
                                        <textarea id="comments" name="comments" rows="4" class="w-full p-2 border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">${state.notesData.comments}</textarea>
                                    </div>
                                    <div>
                                        <label for="treatmentPlan" class="block text-sm font-medium text-slate-600 mb-1">Treatment Plan</label>
                                        <textarea id="treatmentPlan" name="treatmentPlan" rows="4" class="w-full p-2 border border-slate-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 text-sm">${state.notesData.treatmentPlan}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                    </main>
                </div>
            `;
            addEventListeners();
        };

        // --- EVENT HANDLERS & LOGIC ---

        function handleToothSurfaceClick(toothId, surface) {
            const newStatuses = { ...state.toothStatuses };
            const currentToothStatus = newStatuses[toothId] ? { ...newStatuses[toothId] } : {};
            const { selectedStatus } = state;

            if (selectedStatus === ToothStatus.Missing || selectedStatus === ToothStatus.Unerupted) {
                const isAlreadySet = Object.values(currentToothStatus).length === 5 && Object.values(currentToothStatus).every(s => s === selectedStatus);
                if (isAlreadySet) {
                    delete newStatuses[toothId];
                } else {
                    const newStatus = {};
                    Object.values(ToothSurface).forEach(s => { newStatus[s] = selectedStatus; });
                    newStatuses[toothId] = newStatus;
                }
            } else {
                const isWholeToothStatus = Object.values(currentToothStatus).length > 0 && (Object.values(currentToothStatus).every(s => s === ToothStatus.Missing) || Object.values(currentToothStatus).every(s => s === ToothStatus.Unerupted));
                if (isWholeToothStatus) {
                    Object.keys(currentToothStatus).forEach(s => delete currentToothStatus[s]);
                }
                
                if (currentToothStatus[surface] === selectedStatus) {
                    delete currentToothStatus[surface];
                } else {
                    currentToothStatus[surface] = selectedStatus;
                }

                if (Object.keys(currentToothStatus).length === 0) {
                    delete newStatuses[toothId];
                } else {
                    newStatuses[toothId] = currentToothStatus;
                }
            }
            state.toothStatuses = newStatuses;
            document.getElementById('dental-chart-container').innerHTML = renderDentalChart();
            addChartEventListeners();
        }
        
        function handleNoteChange(toothId, noteIndex, value) {
            const newNotes = { ...state.toothNotes };
            const currentNotes = [...(newNotes[toothId] || [undefined, undefined, undefined])];
            currentNotes[noteIndex] = value;

            if (currentNotes.every(note => !note || note.trim() === '')) {
                delete newNotes[toothId];
            } else {
                newNotes[toothId] = currentNotes;
            }
            state.toothNotes = newNotes;
            // No full re-render needed, value is handled by the input itself.
        }

        // --- EVENT LISTENERS SETUP ---
        function addChartEventListeners() {
            // Event delegation for tooth surfaces
            document.getElementById('dental-chart-container').addEventListener('click', (e) => {
                const surfaceElement = e.target.closest('[data-surface]');
                if (surfaceElement) {
                    const toothElement = e.target.closest('[data-tooth-id]');
                    const toothId = parseInt(toothElement.dataset.toothId, 10);
                    const surface = surfaceElement.dataset.surface;
                    handleToothSurfaceClick(toothId, surface);
                }
            });

            // Event listeners for annotation inputs
            document.getElementById('dental-chart-container').querySelectorAll('input[data-tooth-id]').forEach(input => {
                input.addEventListener('change', (e) => {
                    const toothId = parseInt(e.target.dataset.toothId, 10);
                    const noteIndex = parseInt(e.target.dataset.noteIndex, 10);
                    handleNoteChange(toothId, noteIndex, e.target.value);
                });
                input.addEventListener('click', (e) => {
                     if (state.selectedLegendAbbr) {
                        const toothId = parseInt(e.target.dataset.toothId, 10);
                        const noteIndex = parseInt(e.target.dataset.noteIndex, 10);
                        e.target.value = state.selectedLegendAbbr;
                        handleNoteChange(toothId, noteIndex, state.selectedLegendAbbr);
                    }
                });
            });
        }

        function addEventListeners() {
            // Toggle Switch
            document.getElementById('toggle-switch').addEventListener('click', (e) => {
                if (e.target.dataset.patientType) {
                    state.patientType = e.target.dataset.patientType;
                    renderApp();
                }
            });

            // Legend Buttons
            document.getElementById('legend-buttons').addEventListener('click', (e) => {
                const button = e.target.closest('button[data-status]');
                if (button) {
                    state.selectedStatus = button.dataset.status;
                    renderApp();
                }
            });

            // Clear Chart
            document.getElementById('clear-chart-btn').addEventListener('click', () => {
                state.toothStatuses = {};
                state.toothNotes = {};
                state.selectedLegendAbbr = null;
                renderApp();
            });

            // Dental Chart Legend Buttons
            document.getElementById('dental-chart-legend').addEventListener('click', (e) => {
                const button = e.target.closest('button[data-abbr]');
                if (button) {
                    const abbr = button.dataset.abbr;
                    state.selectedLegendAbbr = state.selectedLegendAbbr === abbr ? null : abbr;
                    renderApp();
                }
            });

            // Forms
            document.getElementById('oral-exam-form').addEventListener('change', (e) => {
                if (e.target.tagName === 'SELECT') {
                    state.oralExamData[e.target.name] = e.target.value;
                }
            });
            document.getElementById('notes-form').addEventListener('input', (e) => {
                 if (e.target.tagName === 'TEXTAREA') {
                    state.notesData[e.target.name] = e.target.value;
                }
            });

            addChartEventListeners();
        }

        // --- INITIAL RENDER ---
        document.addEventListener('DOMContentLoaded', renderApp);
    </script>
</body>
</html>

          <!-- Footer -->
<footer class="flex justify-end items-center gap-4 py-4">
    <button type="button" id="btnBack" class="px-6 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition-colors font-semibold">
        Back
    </button>
    <button type="button" id="btnNext" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-semibold">
        Next
    </button>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btnNext = document.getElementById('btnNext');
    const btnBack = document.getElementById('btnBack');

    // Back button goes to Health page
    btnBack.addEventListener('click', () => {
        window.location.href = "@php echo route('health'); @endphp";
    });

    // Next button goes straight to treatment page
    btnNext.addEventListener('click', () => {
        // Optional: save dental chart to localStorage if you want to keep it
        if (typeof state !== 'undefined') {
            const dentalChartData = {
                toothStatuses: state.toothStatuses || {},
                toothNotes: state.toothNotes || {},
                oralExamData: state.oralExamData || {},
                notesData: state.notesData || {},
                patientType: state.patientType || ""
            };
            localStorage.setItem('dentalChartData', JSON.stringify(dentalChartData));
        }

        // Redirect to Treatment page
        window.location.href = "@php echo route('treatment'); @endphp";
    });
});
</script>
