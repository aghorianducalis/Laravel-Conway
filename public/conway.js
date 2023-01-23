
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

/*
./ Initialization
 */


jQuery(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*
    DOM objects
     */

    let $domCellStateMap = jQuery(".map");
    let $domButtonSubmit = jQuery("#button");
    let $domButtonRestart = jQuery("#restartBtn");

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

    /*
    ./ Initialization
     */

    /*
    User input: event listeners, callbacks, data binding, etc.
     */

    $domButtonSubmit.click(function (e) {
        e.preventDefault();

        createNewGeneration();
    });

    jQuery(".cell").click(function (e) {
        e.preventDefault();

        cellOnClickHandler(e, $(this));
    });

    function cellOnClickHandler(e, $domCell) {

        var old_state_id = $domCell.attr("data-state_id");
        var new_state_id = changeCellState(old_state_id);

        // set the new_state_id to DOM element's attribute
        $domCell.attr("data-state_id", new_state_id);
        // $domCell.dataset("state_id", new_state_id);

        if (new_state_id === 2) {
            $domCell.addClass("alive");
        } else {
            $domCell.removeClass("alive");
        }
    }

    function changeCellState(old_state_id) {
        var new_state = generateCellState(old_state_id);
        var new_state_id = new_state.state_id;

        // todo update js variables (maps)

        return new_state_id;
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
    Services: API
     */

    function requestGetStates() {
        jQuery.ajax({
            // url: "{{ route('states.index') }}",
            url: "/states",
            method: 'get',
            success: function(response) {
                states = structuredClone(response);
            }});
    }

    function requestGetCells() {
        jQuery.ajax({
            // url: "{{ route('cells.index') }}",
            url: "/cells",
            method: 'get',
            success: function(response) {
                cells = structuredClone(response);
            }});
    }

    function requestGetCellContacts() {
        jQuery.ajax({
            // url: "{{ route('cell_contacts.index') }}",
            url: "/cell_contacts",
            method: 'get',
            success: function(response) {
                callbackGetCellContacts(response);
            }});
    }

    function requestGetCellStates(generation) {
        jQuery.ajax({
            // url: "{{ route('cell_states.index') }}" + "/" + generation,
            url: "/cell_states/" + generation,
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
            // url: "{{ url('/cell_states') }}",
            url: "/cell_states",
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
            let neighbour_state_count;

            // todo check this
            try {
                neighbour_state_count = cell_state_counter_map[(new_generation - 1)][cell_id]['states_neighbour'][2];
            } catch (e) {
                console.log("Error. Check this out:");
                console.log("cell_id: ", cell_id);
                console.log(cell_state_counter_map[(new_generation - 1)][cell_id] ?? 666);
                throw e;
            }

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

});
