@extends('layouts.app')
@section('content')

    <div class="row text-center">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="errorMsg" class="alert-danger text-capitalize w-75 m-x-auto" role="alert">
            
            </div>
            <div id="successMsg" class="alert-success text-capitalize w-75 m-x-auto" role="alert">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="sections">
                <div>
                    <h2 class="text-center">Section 1</h2>
                </div>
                <div class="add_new text-right">
                    <a href="#section1NewRow" id="addToSection1" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                @include('sections.section_1')
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="sections">
                <div>
                    <h2 class="text-center">Section 2</h2>
                </div>
                <div class="add_new text-right">
                    <button id="addToSection2" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                @include('sections.section_2')
            </div>
        </div>
    </div>

@endsection

@section('js_code')
<script>

    /**********************************************/
    ///////////////    section1    ////////////////
    /*********************************************/
    //store new data to sections table
    $(document).on('click', '#addIn_section1', function() {
        storeInSection('section1', "{{ route('section1.store') }}", "{{ csrf_token() }}");
    });

    //update data of every cell in sections
    $(document).on('blur', '.sec1_cell_update', function(){
        updateInSection(this, "{{ route('section1.update') }}", "{{ csrf_token() }}");
    });

    //delete data from sections table
    $(document).on('click', '.deleteFrom_section1', function() {
        var row_id = $(this).attr('data_id');
        deleteFromSection(row_id, 'section1', "{{ route('section1.delete') }}", "{{ csrf_token() }}");
    });

    /**********************************************/
    ///////////////    section2    ////////////////
    /*********************************************/

    //store new data to sections table
    $(document).on('click', '#addIn_section2', function() {
        storeInSection('section2', "{{ route('section2.store') }}", "{{ csrf_token() }}");
    });

    //update data of every cell in sections
    $(document).on('blur', '.sec2_cell_update', function(){
        updateInSection(this, "{{ route('section2.update') }}", "{{ csrf_token() }}");
    });

    //delete data from sections table
    $(document).on('click', '.deleteFrom_section2', function() {
        var row_id = $(this).attr('data_id');
        deleteFromSection(row_id, 'section2', "{{ route('section2.delete') }}", "{{ csrf_token() }}");
    });


    $("#section1Table tr, #section1Table tr").draggable({
        helper: function(){
            var selected = $('tr.selectedRow');
            if (selected.length === 0) {
                selected = $(this).addClass('selectedRow');
            }
            var container = $('<div/>').attr('id', 'draggingContainer');
            container.append(selected.clone().removeClass("selectedRow"));
            return container;
        }
    });

    $("#section1Table, #section2Table").droppable({
        drop: function (event, ui) {
        $(this).append(ui.helper.children());
        $('.selectedRow').remove();
        }
    });

    $(document).on("click", "tr", function () {
        $(this).toggleClass("selectedRow");
    });

</script>
@endsection