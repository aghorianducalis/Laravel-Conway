<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Conway</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <style>

        /* map */

        .map {
        }

        .map .col {
            max-width: 42px
        }

        .map .cell {
            width: 42px;
            height: 42px;
            background: #2580ff;
            border: 1px solid white;
            cursor: pointer;
        }

        .map .cell:hover {
            opacity: 0.5;
        }

        .map .cell.alive {
            background: #c8fa64;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

        <button type="button"
                class="btn btn-primary btn-outline-primary"
                id="button"
                data-toggle="button"
                aria-pressed="false"
                autocomplete="off"
        >TEMPO!</button>

        <div class="container map">
            @php
                $ct = 0;
                $maximumX = 10;
                $maximumY = 10;
                $z = 0;

                for($x = 0; $x < $maximumX; $x++) {
            @endphp
            <div class="row">
                @php
                    for($y = 0; $y < $maximumY; $y++) {
                @endphp
                <div class="col">
                    <div class="cell"
                         data-id=
                         data-ct=0
                         data-x={{ $x }}
                         data-y={{ $y }}
                         data-z=0
                         data-state_id=1
                    >
                    </div>
                </div>
                @php
                    }
                @endphp
            </div>
            @php
                }
            @endphp
        </div>
</div>
<script>
    jQuery(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /*
        Initialization of variables, data sets etc.
         */

        // todo make an object
        let generation = 1;

        let states = [];
        let cells = [];
        let cell_contacts = [];

        // [ generation_n: [ cell_state_n, ... ], ... ] where
        // 'generation' is number (int) of current generation,
        // 'cell_state' is { id:1, cell_id: 1, state_id: 1, generation:1 }
        let cell_state_map = [];

        // [ cell_n_id: [ cell_contact_cell_n_id, ... ], ... ] where
        // 'cell_id' is id number (int) of current cell,
        // 'cell_contact_cell_id' is id number (int) of the 'contact' cell (neighbour)
        let cell_contact_map = [];

        // [ generation_n: [ cell_n_id: { state_id: 1, contact_cell_state_counters: [ { state_1_id: 5;  state_2_id: 3; ... }, ... ], }, ... ], ... ] where
        // 'generation' is number (int) of current generation,
        // 'cell_id' is id number (int) of current cell,
        // 'state_id' is id number (int) of state of the current cell,
        // 'contact_cell_state_counters' is array with metadata:
        // it contains calculated numbers (counters or totals) of states of the current cell neighbours (contacts)
        let cell_state_counter_map = [];

        // DOM objects
        let $domCellStateMap = jQuery(".map");
        let $domButton = jQuery("#button");

        /*
        ./ Initialization
         */

        /*
        Services: API
         */

        function requestGetStates() {
            jQuery.ajax({
                url: "{{ route('states.index') }}",
                method: 'get',
                success: function(response) {
                    states = structuredClone(response);
                }});
        }

        function requestGetCells() {
            jQuery.ajax({
                url: "{{ route('cells.index') }}",
                method: 'get',
                success: function(response) {
                    cells = structuredClone(response);
                }});
        }

        function requestGetCellContacts() {
            jQuery.ajax({
                url: "{{ route('cell_contacts.index') }}",
                method: 'get',
                success: function(response) {
                    callbackGetCellContacts(response);
                }});
        }

        function requestGetCellStates(generation) {
            jQuery.ajax({
                url: "{{ route('cell_states.index') }}" + "/" + generation,
                method: 'get',
                success: function(response) {
                    callbackGetCellStates(generation, response);
                }});
        }

        function callbackGetCellContacts(response) {
            cell_contacts = structuredClone(response);
            initCellContactMap();
        }

        function callbackGetCellStates(gen, response) {
            initCellStateMap(gen, structuredClone(response));

            setTimeout(function() {
                initCellStateCounterMap(gen);

                // render DOM
                updateDOMCellStateMap(generation);
            }, 3000);
        }

        /**
         * Send request to server to save the new generation of cell states.
         *
         * @param new_gen
         * @param cell_states array with cell state data to send to db
         */
        function requestSaveCellStates(new_gen, cell_states) {
            jQuery.ajax({
                url: "{{ url('/cell_states') }}",
                method: 'post',
                data: {
                    generation: new_gen,
                    cell_states: cell_states,
                },
                success: function(response) {
                    callbackSaveCellStates(new_gen, response);
                }});
        }

        function callbackSaveCellStates(new_gen, response) {
            // Updates global generation variable
            generation = new_gen;

            initCellStateMap(new_gen, structuredClone(response));

            setTimeout(function() {

                initCellStateCounterMap(new_gen);

                // render DOM
                updateDOMCellStateMap(new_gen);
            }, 1000);
        }

        /*
        ./ API
         */

        /*
        Services: init helper variables to keep the data in handy way
         */

        /**
         *
         * Ця функція initializes масив айдішників клітинок "сусідів" даної клітини.
         * Перебирає масив cell_contacts, фільтрує елементи за параметром cell_id клітини (todo),
         * знаходить контакти клітини і записує в глобальну змінну cell_contact_map.
         *
         */
        function initCellContactMap()
        {
            cell_contacts.forEach(function (cell_contact, index, array) {

                let cell_1_id = cell_contact.cell_1_id;
                let cell_2_id = cell_contact.cell_2_id;

                // check and initialize for the very first time
                if (cell_contact_map[cell_1_id] == undefined) {
                    cell_contact_map[cell_1_id] = [cell_2_id];
                } else {
                    cell_contact_map[cell_1_id].push(cell_2_id);
                }
            });
        }

        function initCellStateMap(gen, cell_states)
        {
            // check and initialize for the very first time

            if (cell_state_map[gen] == undefined) {
                cell_state_map[gen] = [];
            }

            // todo check if empty and so on validation?
            cell_state_map[gen] = structuredClone(cell_states);
        }

        function initCellStateCounterMap(gen)
        {
            // check and initialize for the very first time

            if (cell_state_counter_map[gen] == undefined) {
                cell_state_counter_map[gen] = [];
            }

            // for each cell
            cells.forEach(function (cell, index) {
                if (cell_state_counter_map[gen][cell.id] == undefined) {
                    cell_state_counter_map[gen][cell.id] = { 'cell_id': cell.id, 'states_neighbour': []};
                }

                // for each state
                states.forEach(function (state, index) {
                    if (cell_state_counter_map[gen][cell.id]['states_neighbour'][state.id] == undefined) {
                        cell_state_counter_map[gen][cell.id]['states_neighbour'][state.id] = 0;
                    }
                });
            });

            // do calculations of totals

            let cell_states_of_generation = cell_state_map[gen] ?? [];

            cell_states_of_generation.forEach(function (cell_state, index, cell_states_param) {

                // get cell contact ids
                let cell_contact_cell_ids = cell_contact_map[cell_state.cell_id] ?? [];

                cell_contact_cell_ids.forEach(function (cell_contact_cell_id) {
                    // find the state_id of this cell_contact_cell_id
                    let contact_state = cell_states_of_generation[cell_contact_cell_id] ?? [];

                    cell_states_of_generation.forEach(function (cell_state_temp) {
                        if (cell_state_temp['cell_id'] === cell_contact_cell_id) {
                            let contact_state_id = cell_state_temp['state_id'];

                            // increase the appropriate counter
                            cell_state_counter_map[gen][cell_state.cell_id]['states_neighbour'][contact_state_id]++;

                            // we can stop walking through, because there is exactly 1 'cell-state' relation per generation
                            return;
                        }
                    });
                });
            });
        }

        /*
        Services: data generation
         */

        /**
         * якщо в живої клітини один чи немає живих сусідів – то вона помирає від «самотності»;
         * якщо в живої клітини два чи три живих сусіди – то вона лишається жити;
         * якщо в живої клітини чотири та більше живих сусідів – вона помирає від «перенаселення»;
         * якщо в мертвої клітини рівно три живих сусіди – то вона оживає.
         *
         * here we already got all necessary data:
         * states, cells, cell contacts, cell states for previous generation
         *
         * @param new_generation
         * @param previous_cell_states
         */
        function createNewCellStates(
            new_generation,
            previous_cell_states,
        )
        {
            let new_cell_states = [];

            previous_cell_states.forEach(function (cell_state, index, array) {

                let cell_id = cell_state.cell_id;
                let state_id_old = cell_state.state_id;
                let cell_state_id_new = state_id_old;

                // todo check this
                let neighbour_state_count = cell_state_counter_map[(new_generation - 1)][cell_id]['states_neighbour'][2];

                if (state_id_old === 1) {
                    if (neighbour_state_count === 3) {
                        cell_state_id_new = 1;
                    }
                } else if (state_id_old === 2) {
                    if (neighbour_state_count < 2) {
                        cell_state_id_new = 1;
                    } else if (
                        neighbour_state_count === 2 ||
                        neighbour_state_count === 3
                    ) {
                        cell_state_id_new = 2;
                    } else {
                        cell_state_id_new = 1;
                    }
                } else {
                    cell_state_id_new = 1;
                }

                // todo object everywhere not array?
                let cell_state_new = {
                    cell_id: cell_id,
                    state_id: cell_state_id_new,
                    generation: new_generation,
                };

                new_cell_states.push(cell_state_new);
            });

            return new_cell_states;
        }

        function createNewGeneration() {
            let new_generation = generation + 1;

            let generatedCellStateArray = createNewCellStates(
                new_generation,
                cell_state_map[generation],
            );

            requestSaveCellStates(new_generation, generatedCellStateArray);
        }

        function generateCellState(old_state_id) {
            var new_state_id;

            switch (old_state_id) {
                case "1":
                    new_state_id = 2;
                    break;
                case "2":
                    new_state_id = 1;
                    break;
                default:
                    new_state_id = 1;
                    break;
            }

            return { "state_id": new_state_id };
        }

        /*
        ./ Services
         */

        /*
        User input: event listeners, callbacks, data binding, etc.
         */

        $domButton.click(function (e) {
            e.preventDefault();

            createNewGeneration();
        });

        jQuery(".cell").click(function (e) {
            e.preventDefault(e);

            cellOnClickHandler(e, $(this));
        });

        function cellOnClickHandler(e, $domCell) {

            var old_state_id = $domCell.attr("data-state_id");
            var new_state = generateCellState(old_state_id);
            var state_id = new_state.state_id;

            // todo update js variables (maps)

            // set the state_id to DOM element's attribute
            $domCell.attr("data-state_id", state_id);
            // $domCell.dataset("state_id", state_id);

            if (state_id === 2) {
                $domCell.addClass("alive");
            } else {
                $domCell.removeClass("alive");
            }
        }

        /*
        ./ User input
         */

        /*
        Output
         */

        function updateDOMCellStateMap(generation) {

            // 1) get the data from the helper variables (already initialized)

            // array of 'cell_state' objects
            let cell_states_of_generation = cell_state_map[generation] ?? [];

            cell_states_of_generation.forEach(function (cell_state, index, cell_states_param) {

                // find the cell by id
                // todo level this method up and move to CellCollection object
                cells.forEach(function (cell_temp, index) {

                    let cell_id = cell_state.cell_id;

                    if (cell_temp.id === cell_id) {

                        // let ct = cell_temp.ct;
                        let x = cell_temp.x;
                        let y = cell_temp.y;
                        // let z = cell_temp.z;

                        // 2) work with DOM: bind data to DOM elements
                        // todo use data binding

                        // find the DOM element of cell by {ct, x, y, z}
                        let $domCell = $domCellStateMap.find(".cell[data-x=" + x + "]" + "[data-y=" + y + "]");

                        // todo map the current 'cell' variable to DOM object
                        // cells[index].dom_data = $domCell;

                        // set the metadata to DOM element's attributes

                        $domCell.attr("data-id", cell_id);
                        $domCell.attr("data-state_id", cell_state.state_id);

                        if (cell_state.state_id === 2) {
                            $domCell.addClass("alive");
                        }
                    }
                });
            });
        }

        /*
        ./ Output
         */

        /*
        Game
         */

        console.log("-----------------------");
        console.log("START");
        console.log("-----------------------");

        requestGetStates();
        requestGetCells();
        requestGetCellContacts();
        requestGetCellStates(generation);

    });
</script>
<script src="https://code.jquery.com/jquery-3.6.3.js"
        integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="
        crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
