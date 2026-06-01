@extends('components.app')

@section('title', 'Progress Record - Static View')

@section('content')
<div class="max-w-6xl mx-auto my-10 px-4">
    <div class="mb-6">
        <a href="{{ route('progress.index') }}" 
           class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Back to Progress Records
        </a>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-8 py-6 bg-gray-50 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Progress Record #1</h1>
                <p class="text-sm text-gray-500 font-medium">Early Childhood Care and Development (ECCD) Checklist</p>
            </div>
            <div class="text-right">
                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold uppercase tracking-widest">Completed View</span>
            </div>
        </div>

        <div class="p-8 grid grid-cols-1 md:grid-cols-4 gap-8 text-sm text-gray-700">
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Child</p>
                <p class="mt-1 text-base font-semibold text-gray-900 underline decoration-dotted decoration-gray-300">Cj Francisco</p>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Teacher/Examiner</p>
                <p class="mt-1 text-base font-semibold text-gray-900 underline decoration-dotted decoration-gray-300">Mr. Juan Dela Cruz</p>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Assessment Date</p>
                <p class="mt-1 text-base font-medium text-gray-900">May 20, 2026</p>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase">Assessment No.</p>
                <p class="mt-1 text-base font-medium text-gray-900">1</p>
            </div>
        </div>

        <hr class="border-gray-100">

        <!-- Computation of the Child's Age -->
        <div class="mt-16 px-4 sm:px-8">
            <div class="text-center mb-6">
                <p class="text-red-600 font-black italic text-lg uppercase mb-2">It is recommended that the Checklist be administered to the child once a year.</p>
                <h2 class="text-4xl font-black text-[#001f5b] italic uppercase tracking-tight">Computation of the Child's Age</h2>
                <div class="max-w-3xl mx-auto mt-4 text-sm text-gray-700 leading-relaxed font-medium px-4">
                    <p>After verifying the dates, compute the child's age by subtracting the date he was born from the date the test was administered. Each month is composed of 30 days. Do not round off the months or years. Write the examiner's name each time the test is administered.</p>
                </div>
            </div>

            <div class="max-w-5xl mx-auto border-[3px] border-[#001f5b] overflow-hidden bg-white shadow-sm overflow-x-auto">
                <table class="w-full border-collapse min-w-[900px]">
                    <thead>
                        <tr class="bg-[#7a9ab5] text-white uppercase text-sm font-black italic tracking-widest">
                            <th class="py-3 px-4 border-r-2 border-[#001f5b] w-1/4"></th>
                            <th class="py-3 border-r-2 border-[#001f5b]">Year</th>
                            <th class="py-3 border-r-2 border-[#001f5b]">Month</th>
                            <th class="py-3 border-r-2 border-[#001f5b]">Day</th>
                            <th class="py-3 w-1/3">Examiner's Name</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-[#001f5b]">
                        @php
                            $assessments = [
                                ['label' => '1st', 'color' => '#ff0000', 'date' => '2026', 'month' => '05', 'day' => '20', 'examiner' => 'Mr. Juan Dela Cruz'],
                                ['label' => '2nd', 'color' => '#ff9900', 'date' => '', 'month' => '', 'day' => '', 'examiner' => ''],
                                ['label' => '3rd', 'color' => '#ffff00', 'date' => '', 'month' => '', 'day' => '', 'examiner' => '']
                            ];
                        @endphp
                        @foreach($assessments as $asmt)
                        <tr class="h-32">
                            <td class="border-r-2 border-[#001f5b] p-0 overflow-hidden">
                                <div class="flex h-full">
                                    <div class="w-16 flex flex-col items-center justify-center text-white font-black italic leading-none shrink-0" style="background-color: {{ $asmt['color'] }}">
                                        <span class="text-3xl">{{ $asmt['label'] }}</span>
                                        <span class="text-[8px] uppercase tracking-tighter mt-1">assessment</span>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-between text-[11px] font-black uppercase p-2 text-[#001f5b] italic">
                                        <div class="border-b border-[#001f5b]/20 pb-1">Date Tested</div>
                                        <div class="border-b border-[#001f5b]/20 py-1">Child's Date of Birth</div>
                                        <div class="pt-1">Child's Age</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-r-2 border-[#001f5b] relative">
                                <div class="absolute inset-0 flex flex-col divide-y divide-[#001f5b]/30 text-center font-bold text-lg">
                                    <div class="flex-1 flex items-center justify-center">{{ $asmt['date'] }}</div>
                                    <div class="flex-1 flex items-center justify-center bg-gray-50 italic text-gray-400">2023</div>
                                    <div class="flex-1 flex items-center justify-center text-[#001f5b]">{{ $asmt['date'] ? '3' : '' }}</div>
                                </div>
                            </td>
                            <td class="border-r-2 border-[#001f5b] relative">
                                <div class="absolute inset-0 flex flex-col divide-y divide-[#001f5b]/30 text-center font-bold text-lg">
                                    <div class="flex-1 flex items-center justify-center">{{ $asmt['month'] }}</div>
                                    <div class="flex-1 flex items-center justify-center bg-gray-50 italic text-gray-400">03</div>
                                    <div class="flex-1 flex items-center justify-center text-[#001f5b]">{{ $asmt['month'] ? '2' : '' }}</div>
                                </div>
                            </td>
                            <td class="border-r-2 border-[#001f5b] relative">
                                <div class="absolute inset-0 flex flex-col divide-y divide-[#001f5b]/30 text-center font-bold text-lg">
                                    <div class="flex-1 flex items-center justify-center">{{ $asmt['day'] }}</div>
                                    <div class="flex-1 flex items-center justify-center bg-gray-50 italic text-gray-400">15</div>
                                    <div class="flex-1 flex items-center justify-center text-[#001f5b]">{{ $asmt['day'] ? '5' : '' }}</div>
                                </div>
                            </td>
                            <td class="p-4 text-center">
                                <div class="h-full flex items-center justify-center border-b-2 border-dotted border-[#001f5b] font-bold text-[#001f5b] italic">
                                    {{ $asmt['examiner'] }}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

<!-- ====================== ALL DOMAIN TABLES ====================== -->
        <div class="p-8 space-y-16">

            <!-- Gross Motor -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Gross Motor Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Gross Motor',
                    'items' => [
                        ['id'=>1,'task'=>'Climbs on chair or other elevated piece of furniture like a bed without help','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>2,'task'=>'Walks backwards','proc'=>'MATERIAL: toy. PROCEDURE: Ask the child to walk backwards...','val'=>[true,true,true]],
                        ['id'=>3,'task'=>'Runs without tripping or falling','proc'=>'MATERIAL: ball. PROCEDURE: Encourage the child to run...','val'=>[true,false,false]],
                        ['id'=>4,'task'=>'Walks down stairs, two feet on each step, with one hand held','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>5,'task'=>'Walks upstairs holding onto a handrail, two feet on each step','proc'=>'MATERIAL: toy...','val'=>[false,true,false]],
                        ['id'=>6,'task'=>'Walks upstairs with alternate feet without holding onto a handrail','proc'=>'MATERIAL: toy...','val'=>[false,false,false]],
                        ['id'=>7,'task'=>'Walks downstairs with alternate feet without holding onto a handrail','proc'=>'MATERIALS: toy...','val'=>[false,false,false]],
                        ['id'=>8,'task'=>'Moves body part as directed','proc'=>'PROCEDURE: Ask the child to raise both arms.','val'=>[true,true,true]],
                        ['id'=>9,'task'=>'Jumps up','proc'=>'This must be elicited by the interviewer.','val'=>[true,false,false]],
                        ['id'=>10,'task'=>'Throws ball overhead with direction','proc'=>'MATERIAL: ball...','val'=>[false,false,false]],
                        ['id'=>11,'task'=>'Hops one to three steps on preferred foot','proc'=>'PROCEDURE: Ask the child to hop...','val'=>[false,false,false]],
                        ['id'=>12,'task'=>'Jumps and turns','proc'=>'PROCEDURE: Ask the child to jump while making a half-turn.','val'=>[false,false,false]],
                        ['id'=>13,'task'=>'Dances patterns/joins group movement activities','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                    ]
                ])
            </div>

            <!-- Fine Motor -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Fine Motor Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Fine Motor',
                    'items' => [
                        ['id'=>1,'task'=>'Uses all five fingers to get food/toys placed on a flat surface','proc'=>'MATERIAL: small toy/object...','val'=>[true,true,true]],
                        ['id'=>2,'task'=>'Picks up objects with thumb and index finger','proc'=>'MATERIAL: any small toy or food...','val'=>[true,true,false]],
                        ['id'=>3,'task'=>'Displays a definite hand preference','proc'=>'MATERIAL: toy...','val'=>[true,false,false]],
                        ['id'=>4,'task'=>'Puts small objects in/out of containers','proc'=>'MATERIALS: small objects, container...','val'=>[true,true,true]],
                        ['id'=>5,'task'=>'Holds crayon with all the fingers of his hand making a fist','proc'=>'MATERIAL: crayon...','val'=>[true,false,false]],
                        ['id'=>6,'task'=>'Unscrews the lid of a container or unwraps food','proc'=>'MATERIALS: container with screw-on top...','val'=>[false,false,false]],
                        ['id'=>7,'task'=>'Scribbles spontaneously','proc'=>'MATERIALS: paper, pencil/crayon...','val'=>[true,true,false]],
                        ['id'=>8,'task'=>'Scribbles vertical and horizontal lines','proc'=>'MATERIALS: paper, pencil/crayon...','val'=>[true,false,false]],
                        ['id'=>9,'task'=>'Draws circle purposefully','proc'=>'MATERIALS: paper, pencil/crayon...','val'=>[false,false,false]],
                        ['id'=>10,'task'=>'Draws a human figure (head, eyes, trunk, arms, hands/fingers)','proc'=>'MATERIALS: paper, pencil...','val'=>[false,false,false]],
                        ['id'=>11,'task'=>'Draws a house using geometric forms','proc'=>'MATERIALS: paper, pencil...','val'=>[false,false,false]],
                    ]
                ])
            </div>

            <!-- Self-Help (27 items) -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Self-Help Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Self-Help',
                    'items' => [
                        ['id'=>1,'task'=>'Feeds self with finger food (e.g. biscuits, bread) using fingers','proc'=>'MATERIALS: bread, biscuits...','val'=>[true,true,true]],
                        ['id'=>2,'task'=>'Feeds self using fingers to eat rice/viands with spillage','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>3,'task'=>'Feeds self using spoon with spillage','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>4,'task'=>'Feeds self using fingers without spillage','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>5,'task'=>'Feeds self using spoon without spillage','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>6,'task'=>'Eats without need for spoonfeeding during any meal','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>7,'task'=>'Helps hold cup for drinking','proc'=>'Note: The cup should not have a lid or spout.','val'=>[true,true,false]],
                        ['id'=>8,'task'=>'Drinks from cup with spillage','proc'=>'Ask the caregiver...','val'=>[true,false,false]],
                        ['id'=>9,'task'=>'Drinks from cup unassisted','proc'=>'MATERIALS: drinking cup, water...','val'=>[true,true,true]],
                        ['id'=>10,'task'=>'Gets drink for self unassisted','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>11,'task'=>'Pours from pitcher without spillage','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>12,'task'=>'Prepares own food/snack','proc'=>'Ask the caregiver...','val'=>[false,false,false]],
                        ['id'=>13,'task'=>'Prepares meals for younger siblings/family members when no adult is around','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>14,'task'=>'Participates when being dressed (e.g., raises arms or lifts leg)','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>15,'task'=>'Pulls down gartered short pants','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>16,'task'=>'Removes sando','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>17,'task'=>'Dresses without assistance except for buttons and tying','proc'=>'Material: small shirt w/button...','val'=>[false,false,false]],
                        ['id'=>18,'task'=>'Dresses without assistance including buttons and tying','proc'=>'PROCEDURE: Have the child demonstrate...','val'=>[false,false,false]],
                        ['id'=>19,'task'=>'Informs the adult only after he has already urinated (peed) or moved his bowels','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>20,'task'=>'Informs the adult of need to urinate (pee) or move bowels','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>21,'task'=>'Goes to the designated place but sometimes still does this in his underpants','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>22,'task'=>'Goes to the designated place and never does this in his underpants anymore','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>23,'task'=>'Wipes/cleans self after a bowel movement (pooh)','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>24,'task'=>'Participates when bathing (e.g., rubbing arms with soap)','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>25,'task'=>'Washes and dries hands without any help','proc'=>'Ask the caregiver...','val'=>[true,false,false]],
                        ['id'=>26,'task'=>'Washes face without any help','proc'=>'Ask the caregiver...','val'=>[false,false,false]],
                        ['id'=>27,'task'=>'Bathes without any help','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                    ]
                ])
            </div>

            <!-- Receptive Language -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Receptive Language Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Receptive Language',
                    'items' => [
                        ['id'=>1,'task'=>'Points to a family member when asked to do so','proc'=>'PROCEDURE: Ask the child to point to his mother/caregiver.','val'=>[true,true,true]],
                        ['id'=>2,'task'=>'Points to five body parts on himself when asked to do so','proc'=>'PROCEDURE: Have the child point to eyes, nose...','val'=>[true,true,false]],
                        ['id'=>3,'task'=>'Points to five named pictured objects when asked to do so','proc'=>'MATERIAL: picture book 1...','val'=>[true,false,false]],
                        ['id'=>4,'task'=>'Follows one-step instructions that include simple prepositions','proc'=>'MATERIAL: block/toy...','val'=>[true,true,false]],
                        ['id'=>5,'task'=>'Follows two-step instructions that include simple prepositions','proc'=>'MATERIAL: block/toy...','val'=>[false,false,false]],
                    ]
                ])
            </div>

            <!-- Expressive Language -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Expressive Language Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Expressive Language',
                    'items' => [
                        ['id'=>1,'task'=>'Uses five to 20 recognizable words','proc'=>'PROCEDURE: Ask the caregiver...','val'=>[true,true,true]],
                        ['id'=>2,'task'=>'Uses pronouns (e.g. I, me, ako, akin)','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>3,'task'=>'Uses two- to three-word verb-noun combinations','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>4,'task'=>'Names objects in pictures','proc'=>'MATERIAL: picture book 2...','val'=>[true,false,false]],
                        ['id'=>5,'task'=>'Speaks in grammatically correct two- to three-word sentences','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>6,'task'=>'Asks “what” questions','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>7,'task'=>'Asks “who” and “why” questions','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>8,'task'=>'Gives account of recent experiences','proc'=>'PROCEDURE: Ask the caregiver...','val'=>[false,false,false]],
                    ]
                ])
            </div>

            <!-- Cognitive -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Cognitive Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Cognitive',
                    'items' => [
                        ['id'=>1,'task'=>'Looks in the direction of fallen object','proc'=>'MATERIAL: spoon/ball...','val'=>[true,true,true]],
                        ['id'=>2,'task'=>'Looks for a partially hidden object','proc'=>'MATERIALS: ball, small towel...','val'=>[true,false,false]],
                        ['id'=>3,'task'=>'Imitates behavior just seen a few minutes earlier','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>4,'task'=>'Offers an object but will not release it','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>5,'task'=>'Looks for a completely hidden object','proc'=>'MATERIALS: ball, small towel...','val'=>[true,true,false]],
                        ['id'=>6,'task'=>'Exhibits simple “pretend” play','proc'=>'MATERIALS: doll or toy car...','val'=>[true,false,false]],
                        ['id'=>7,'task'=>'Matches objects','proc'=>'MATERIALS: pairs of spoons...','val'=>[true,true,true]],
                        ['id'=>8,'task'=>'Matches two to three colors','proc'=>'MATERIALS: Three pairs of crayons...','val'=>[true,true,false]],
                        ['id'=>9,'task'=>'Matches pictures','proc'=>'MATERIALS: Three pairs of picture cards...','val'=>[true,false,false]],
                        ['id'=>10,'task'=>'Sorts based on shapes','proc'=>'MATERIALS: Four pairs of different shapes...','val'=>[false,false,false]],
                        ['id'=>11,'task'=>'Sorts objects based on two attributes','proc'=>'MATERIALS: Four pairs...','val'=>[false,false,false]],
                        ['id'=>12,'task'=>'Arranges objects according to size','proc'=>'MATERIALS: Graduated squares...','val'=>[false,false,false]],
                        ['id'=>13,'task'=>'Names four to six colors','proc'=>'MATERIALS: Six papers of different colors...','val'=>[false,false,false]],
                        ['id'=>14,'task'=>'Copies shapes','proc'=>'MATERIALS: paper and pen...','val'=>[false,false,false]],
                        ['id'=>15,'task'=>'Names 3 animals or vegetables when asked','proc'=>'Credit if child can name 3...','val'=>[false,false,false]],
                        ['id'=>16,'task'=>'States what common household items are used for','proc'=>'Credit if can state use of at least two items.','val'=>[false,false,false]],
                        ['id'=>17,'task'=>'Can assemble simple puzzles','proc'=>'MATERIAL: Simple 4-6 piece puzzle...','val'=>[false,false,false]],
                        ['id'=>18,'task'=>'Demonstrates an understanding of opposites','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>19,'task'=>'Points to left and right sides of body','proc'=>'PROCEDURE: Ask to show left/right...','val'=>[false,false,false]],
                        ['id'=>20,'task'=>'Can state what is silly or wrong with pictures','proc'=>'MATERIALS: Two silly picture cards.','val'=>[false,false,false]],
                        ['id'=>21,'task'=>'Matches upper case letters and matches lower case letters','proc'=>'MATERIALS: Alphabet cards...','val'=>[false,false,false]],
                    ]
                ])
            </div>

            <!-- Social-Emotional -->
            <div>
                <h2 class="text-xl font-black text-gray-900 uppercase tracking-tight text-center mb-6">Social-Emotional Domain</h2>
                @include('progress.partials.domain-table', [
                    'domainName' => 'Social-Emotional',
                    'items' => [
                        ['id'=>1,'task'=>'Enjoys watching activities of nearby people or animals','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>2,'task'=>'Friendly with strangers but initially may show slight anxiety','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>3,'task'=>'Plays alone but likes to be near familiar adults','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>4,'task'=>'Laughs or squeals aloud in play','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>5,'task'=>'Plays peek-a-boo','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>6,'task'=>'Rolls ball interactively with caregiver','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>7,'task'=>'Hugs or cuddles toys','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>8,'task'=>'Demonstrates respect for elders using “po” and “opo”','proc'=>'Parental report will suffice.','val'=>[true,false,false]],
                        ['id'=>9,'task'=>'Shares toys with others','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>10,'task'=>'Imitates adult activities','proc'=>'Parental report will suffice.','val'=>[true,true,true]],
                        ['id'=>11,'task'=>'Identifies feelings in others','proc'=>'Credit if the child can tell...','val'=>[true,false,false]],
                        ['id'=>12,'task'=>'Appropriately uses cultural gestures of greeting','proc'=>'Parental report will suffice.','val'=>[true,true,false]],
                        ['id'=>13,'task'=>'Comforts playmates/siblings in distress','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>14,'task'=>'Persists when faced with a problem','proc'=>'Credit if the child tries to solve...','val'=>[false,false,false]],
                        ['id'=>15,'task'=>'Helps with family chores','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>16,'task'=>'Curious about environment but knows when to stop asking','proc'=>'Credit if child asks questions...','val'=>[false,false,false]],
                        ['id'=>17,'task'=>'Waits for his turn','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>18,'task'=>'Asks permission to play with toy being used by another','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>19,'task'=>'Defends possessions with determination','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>20,'task'=>'Plays organized group games fairly','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>21,'task'=>'Can talk about complex feelings','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>22,'task'=>'Honors a simple bargain with caregiver','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>23,'task'=>'Watches responsibly over younger siblings','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                        ['id'=>24,'task'=>'Cooperates with adults and peers in group situations','proc'=>'Parental report will suffice.','val'=>[false,false,false]],
                    ]
                ])
            </div>

        </div>

        <!-- Notes Section -->
        <div class="p-10 space-y-12 bg-white border-t border-gray-100">
            <div class="grid grid-cols-1 gap-6 max-w-3xl">
                <div class="flex items-baseline space-x-2">
                    <span class="text-sm font-bold whitespace-nowrap text-gray-600 uppercase tracking-tight">Name of examiner :</span>
                    <span class="flex-1 border-b border-gray-400 font-semibold px-2 text-blue-800">Mr. Juan Dela Cruz</span>
                </div>
                <div class="flex items-baseline space-x-2">
                    <span class="text-sm font-bold whitespace-nowrap text-gray-600 uppercase tracking-tight">Date administered :</span>
                    <span class="flex-1 border-b border-gray-400 font-semibold px-2 text-blue-800">May 20, 2026</span>
                </div>
            </div>
            <div class="space-y-10">
                @php
                $sections = [
                    "Child's background" => "The child was cooperative but slightly shy at the start of the evaluation.",
                    "Family environment" => "Supportive household with both parents present during the assessment.",
                    "Parents' stimulating activities" => "Parents engage in daily outdoor play and reading sessions.",
                    "Home environment" => "Safe indoor environment with age-appropriate toys available.",
                    "Others" => "N/A"
                ];
                @endphp
                @foreach($sections as $title => $content)
                <div>
                    <h3 class="text-xs font-bold text-gray-500 mb-1 uppercase tracking-widest">{{ $title }}</h3>
                    <div class="ruled-paper p-4 text-sm text-gray-700 italic leading-[2rem]">
                        {{ $content }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Raw/Scaled Scores + Charts -->
        <div class="p-8 space-y-10">
            <p class="text-[11px] text-gray-600 mb-4 leading-relaxed">
                Transfer the raw score for each domain in the table below. Using the <strong>Scaled Score Equivalent of Raw Scores Table</strong>, convert the raw scores to Scaled Scores appropriate to the age of the child. To arrive at the Sum of Scaled Scores, add the Scaled Scores across all domains. To derive the Standard Score, refer to the <strong>Standard Score Equivalent of Sums of Scaled Scores Table</strong>. Write the Child's age on each evaluation.
            </p>

            <div class="border-[3px] border-[#001f5b] overflow-hidden shadow-md overflow-x-auto">
                <table class="w-full border-collapse text-sm min-w-[1100px]">
                    <thead>
                        <tr>
                            <th rowspan="3" class="bg-[#001f5b] text-white text-6xl font-black italic px-6 py-10 w-1/4 border-r-4 border-[#001f5b]">Domain</th>
                            <th colspan="6" class="bg-white text-[#001f5b] text-5xl font-black italic py-3 border-b-2 border-[#001f5b]">Age</th>
                        </tr>
                        <tr class="bg-white text-[11px] text-gray-800">
                            <th colspan="2" class="border-r-2 border-[#001f5b] border-b py-2 px-2 text-center">
                                <div class="flex justify-center space-x-4 mb-1">
                                    <span>1<sup>st</sup> Evaluation</span>
                                    <span>Date: <span class="underline">05/20/2026</span></span>
                                </div>
                                <div class="border-t border-gray-300 pt-1 w-3/4 mx-auto">
                                    <span class="text-gray-600">Child's Age: <span class="underline">3y 2m</span></span>
                                </div>
                            </th>
                            <th colspan="2" class="border-r-2 border-[#001f5b] border-b py-2 px-2 text-center">
                                <div class="flex justify-center space-x-4 mb-1 text-gray-400">
                                    <span>2<sup>nd</sup> Evaluation</span>
                                    <span>Date: <span class="underline">________</span></span>
                                </div>
                                <div class="border-t border-gray-300 pt-1 w-3/4 mx-auto">
                                    <span class="text-gray-400">Child's Age: <span class="underline">________</span></span>
                                </div>
                            </th>
                            <th colspan="2" class="border-b py-2 px-2 text-center">
                                <div class="flex justify-center space-x-4 mb-1 text-gray-400">
                                    <span>3<sup>rd</sup> Evaluation</span>
                                    <span>Date: <span class="underline">________</span></span>
                                </div>
                                <div class="border-t border-gray-300 pt-1 w-3/4 mx-auto">
                                    <span class="text-gray-400">Child's Age: <span class="underline">________</span></span>
                                </div>
                            </th>
                        </tr>
                        <tr class="bg-[#ff0000] text-white text-[10px] font-bold uppercase tracking-tighter">
                            <th class="py-1 border-r border-white/30">Raw Score</th>
                            <th class="py-1 border-r-2 border-[#001f5b]">Scaled Score</th>
                            <th class="py-1 border-r border-white/30">Raw Score</th>
                            <th class="py-1 border-r-2 border-[#001f5b]">Scaled Score</th>
                            <th class="py-1 border-r border-white/30">Raw Score</th>
                            <th class="py-1">Scaled Score</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#001f5b]/20">
                        @php
                            $domains = ["Gross Motor", "Fine Motor", "Self-Help", "Receptive Language", "Expressive Language", "Cognitive", "Social- Emotional"];
                        @endphp
                        @foreach($domains as $domain)
                        <tr class="h-10">
                            <td class="px-4 font-bold text-gray-800 border-r-4 border-[#001f5b]">{{ $domain }}</td>
                            <td class="border-r border-gray-200 bg-white text-center">12</td>
                            <td class="border-r-2 border-[#001f5b] bg-white text-center font-bold">10</td>
                            <td class="border-r border-gray-200 bg-white"></td>
                            <td class="border-r-2 border-[#001f5b] bg-white"></td>
                            <td class="border-r border-gray-200 bg-white"></td>
                            <td class="bg-white"></td>
                        </tr>
                        @endforeach
                        <tr class="h-10">
                            <td class="px-4 font-bold text-[#e91e63] border-r-4 border-[#001f5b]">Sum of Scaled Scores</td>
                            <td class="bg-[#879fb1] border-r border-white/20"></td>
                            <td class="border-r-2 border-[#001f5b] bg-white text-center font-bold text-[#001f5b]">70</td>
                            <td class="bg-[#879fb1] border-r border-white/20"></td>
                            <td class="border-r-2 border-[#001f5b] bg-white"></td>
                            <td class="bg-[#879fb1] border-r border-white/20"></td>
                            <td class="bg-white"></td>
                        </tr>
                        <tr class="h-10">
                            <td class="px-4 font-bold text-[#e91e63] border-r-4 border-[#001f5b]">Standard Score</td>
                            <td class="bg-[#879fb1] border-r border-white/20"></td>
                            <td class="border-r-2 border-[#001f5b] bg-white text-center font-bold text-[#001f5b]">100</td>
                            <td class="bg-[#879fb1] border-r border-white/20"></td>
                            <td class="border-r-2 border-[#001f5b] bg-white"></td>
                            <td class="bg-[#879fb1] border-r border-white/20"></td>
                            <td class="bg-white"></td>
                        </tr>
                        <tr class="h-16">
                            <td class="px-4 font-bold text-[#e91e63] border-r-4 border-[#001f5b]">Interpretation</td>
                            <td colspan="2" class="border-r-2 border-[#001f5b] bg-white text-center text-[11px] font-medium p-2 italic">Average Development</td>
                            <td colspan="2" class="border-r-2 border-[#001f5b] bg-white"></td>
                            <td colspan="2" class="bg-white"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Scaled Scores Chart -->
            <div class="mt-16">
                <h2 class="text-4xl font-black text-[#001f5b] text-center italic mb-2">Scaled Scores</h2>
                <p class="text-xs text-gray-700 mb-6 text-center">Mark an <strong>x</strong> on the dot corresponding to the Scaled Score for each domain and connect the <strong>x's</strong>. Write the child's age on each evaluation.</p>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 border-4 border-[#001f5b]">
                    @for ($eval = 1; $eval <= 3; $eval++)
                    <div class="{{ $eval < 3 ? 'lg:border-r-4 lg:border-[#001f5b]' : '' }} p-4 bg-white">
                        <div class="flex items-center justify-center space-x-2 mb-4">
                            <span class="text-[#001f5b] font-bold text-sm">Child's Age:</span>
                            <span class="border-b border-[#001f5b] w-48 text-center text-sm font-semibold">{{ $eval == 1 ? '3y 2m' : '________' }}</span>
                        </div>

                        <div class="bg-[#001f5b] text-white text-[10px] font-bold py-1 text-center uppercase tracking-widest mb-0.5">Domain</div>

                        <div class="flex border border-[#001f5b]">
                            <div class="flex shrink-0">
                                <div class="flex flex-col w-10 border-r border-[#001f5b] text-[11px] font-bold text-center leading-tight">
                                    <div class="h-32 border-b border-[#001f5b]"></div> <div class="h-[calc(6*1.5rem)] flex items-center justify-center bg-[#ffff99] [writing-mode:vertical-lr] rotate-180 border-b border-gray-300">Suggests advanced development</div>
                                    <div class="h-[calc(7*1.5rem)] flex items-center justify-center bg-[#ffff99] [writing-mode:vertical-lr] rotate-180 border-b border-gray-300 relative">
                                        <div class="absolute inset-0 flex items-center justify-center">Average development</div>
                                        </div>
                                    <div class="h-[calc(6*1.5rem)] flex items-center justify-center bg-[#fdfeca] [writing-mode:vertical-lr] rotate-180">Re-test after 3- 6 months</div>
                                </div>

                                <div class="flex flex-col w-10 border-r border-[#001f5b]">
                                    <div class="h-32 bg-red-600 text-white [writing-mode:vertical-lr] rotate-180 text-[10px] font-bold flex items-center justify-center border-b border-[#001f5b]">SCALED SCORE</div>
                                    @for ($i = 19; $i >= 1; $i--)
                                    <div class="h-6 flex items-center justify-center border-b border-gray-300 text-xs font-bold 
                                        {{ $i == 10 ? 'bg-[#8fa9bc] text-black' : ($i >= 7 ? 'bg-[#ffff99]' : 'bg-[#fdfeca]') }}">
                                        {{ $i }}
                                    </div>
                                    @endfor
                                </div>
                            </div>

                            <div class="flex-1 grid grid-cols-7">
                                @foreach($domains as $domain)
                                <div class="flex flex-col border-r border-gray-300 last:border-r-0">
                                    <div class="h-32 border-b border-[#001f5b] relative bg-white">
                                        <div class="absolute bottom-2 left-1/2 -translate-x-1/2 [writing-mode:vertical-lr] rotate-180 text-[8px] font-bold uppercase text-gray-800 whitespace-nowrap">{{ $domain }}</div>
                                    </div>

                                    @for ($i = 19; $i >= 1; $i--)
                                    <div class="h-6 border-b border-gray-300 last:border-b-0 flex items-center justify-center
                                        {{ $i == 10 ? 'bg-[#8fa9bc]' : ($i >= 7 ? 'bg-[#ffff99]' : 'bg-[#fdfeca]') }}">
                                        
                                        @if($eval == 1 && $domain == "Gross Motor" && $i == 10)
                                            <span class="font-black text-[#001f5b] text-sm">x</span>
                                        @else
                                            <div class="w-1 h-1 bg-black rounded-full opacity-80"></div>
                                        @endif
                                    </div>
                                    @endfor
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

<div class="mt-16">
    <h2 class="text-4xl font-black text-[#001f5b] text-center italic mb-2 uppercase">Standard Scores</h2>
    <p class="text-xs text-gray-700 mb-6 text-center italic">Mark an <strong>x</strong> on the corresponding standard score for each test administration and connect the <strong>x's</strong>. Write the date for each test administration.</p>
    
    <div class="max-w-5xl mx-auto border-4 border-[#001f5b] overflow-x-auto">
        <div class="min-w-[900px]">
            <div class="grid grid-cols-[180px_1fr] bg-white border-b-4 border-[#001f5b]">
                <div class="border-r-2 border-[#001f5b] flex items-center justify-center py-2">
                    <span class="text-2xl font-black italic text-[#001f5b] tracking-widest">AGES</span>
                </div>
                <div class="grid grid-cols-3 text-white text-sm font-black uppercase italic tracking-tight">
                    <div class="bg-[#1e1e9c] py-4 text-center border-r border-white/20">3 years & 1 month</div>
                    <div class="bg-[#9c1e9c] py-4 text-center border-r border-white/20">4 years</div>
                    <div class="bg-[#ff007f] py-4 text-center">5 years</div>
                </div>
            </div>

            <div class="flex">
                <div class="w-[180px] flex shrink-0 border-r-2 border-[#001f5b]">
                    <div class="w-16 flex flex-col border-r border-gray-300 font-black text-[9px] uppercase text-center leading-tight bg-white">
                        <div class="h-[174px] flex items-center justify-center [writing-mode:vertical-lr] rotate-180 px-1 border-b border-gray-400">Suggests advanced development</div>
                        <div class="h-[217.5px] flex items-center justify-center [writing-mode:vertical-lr] rotate-180 px-1 border-b border-gray-400">Average development</div>
                        <div class="h-[217.5px] flex items-center justify-center [writing-mode:vertical-lr] rotate-180 px-1">Re-test after 3 to 6 months</div>
                    </div>
                    
                    <div class="flex-1 flex flex-col text-right">
                        @for ($s = 160; $s >= 20; $s -= 10)
                        <div class="h-[40.5px] flex items-center justify-end pr-3 text-sm font-black text-[#001f5b]
                            {{ $s >= 130 ? 'bg-[#ffff66]' : '' }}
                            {{ ($s < 130 && $s >= 80) ? 'bg-[#ffffcc]' : '' }}
                            {{ $s < 80 ? 'bg-[#fffdeb]' : '' }}">
                            {{ $s }} <span class="ml-2 w-3 h-[2px] bg-[#001f5b]"></span>
                        </div>
                        @endfor
                    </div>
                </div>

                <div class="flex-1 grid grid-cols-3 h-[609px]">
                    @for ($col = 1; $col <= 3; $col++)
                    <div class="relative border-r-2 border-[#001f5b] last:border-r-0 overflow-hidden">
                        <div class="absolute top-0 w-full h-[174px] bg-[#ffff66]"></div> 
                        <div class="absolute top-[174px] w-full h-[217.5px] bg-[#ffffcc]"></div> 
                        <div class="absolute top-[391.5px] w-full h-[217.5px] bg-[#fffdeb]"></div> 
                        
                        <div class="absolute inset-0 flex justify-center pointer-events-none">
                            <div class="w-[2px] bg-[#001f5b]/30 h-full relative">
                                {{-- 
                                   Looping from score 160 down to 20. 
                                   Each 10-point block is 43.5px high.
                                   Each 2-point tick is 8.7px apart.
                                --}}
                                @for ($val = 160; $val >= 20; $val -= 2)
                                    @php 
                                        $distanceFromTop = (160 - $val) * 4.5; 
                                    @endphp
                                    <div class="absolute h-[1px] bg-[#001f5b]/60 -translate-y-1/2
                                        {{ $val % 10 == 0 ? 'w-6 -left-3 bg-[#001f5b]' : 'w-3 -left-1.5' }}" 
                                        style="top: {{ $distanceFromTop + 21.75 }}px">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>

            <div class="grid grid-cols-[180px_1fr] border-t-4 border-[#001f5b] bg-white">
                <div class="border-r-2 border-[#001f5b] flex items-center px-4 py-3">
                    <span class="text-xs font-black text-[#001f5b] uppercase">Date Tested</span>
                </div>
                <div class="grid grid-cols-3 font-bold text-sm">
                    <div class="p-4 border-r border-[#001f5b] text-center underline decoration-dotted">05/20/2026</div>
                    <div class="p-4 border-r border-[#001f5b] text-center text-gray-400 italic">MM / DD / YYYY</div>
                    <div class="p-4 text-center text-gray-400 italic">MM / DD / YYYY</div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<style>
    .border-navy-900 { border-color: #001f5b; }
    .bg-navy-900 { background-color: #001f5b; }
    
    .ruled-paper {
        background-image: linear-gradient(#e5e7eb 1px, transparent 1px);
        background-size: 100% 2rem;
        line-height: 2rem;
        min-height: 6rem;
    }

    @media print {
        @page { margin: 0; }
        body { padding: 2cm; }
        .no-print { display: none; }
    }
</style>
@endsection