<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6">
    <div class="form-check">
        <!-- {!! Form::hidden('level', 0, ['class' => 'form-check-input']) !!}
        {!! Form::checkbox('level', '1', null, ['class' => 'form-check-input']) !!} -->
        {!! Form::label('level', 'Level', ['class' => 'form-check-label']) !!}
        <select name="level" class="form-control">
            <option value="1" @if($wilayah->level == 1) selected @endif>Negara</option>
            <option value="2" @if($wilayah->level == 2) selected @endif>Provinsi</option>
            <option value="3"@if($wilayah->level == 3) selected @endif>Kabupaten/Kota</option>
            <option value="4" @if($wilayah->level == 4) selected @endif>Kecamatan</option>
            <option value="5" @if($wilayah->level == 5) selected @endif>Kelurahan</option>
        </select>
    </div>
</div>


<!-- Id Parent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_parent', 'Parent:') !!} 
    <input class="form-control" type="text" name="parent" id="parent" value="@if(isset($wilayah->parent->nama)){{$wilayah->parent->nama}}@endif"> 
    <input class="form-control" type="hidden" name="id_parent" id="id_parent" value="{{$wilayah->id_parent}}"> 
</div>

<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::text('created_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div> -->

<!-- Edited By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    {!! Form::text('edited_by', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div> -->

<!-- Edited At Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    {!! Form::text('edited_at', null, ['class' => 'form-control','id'=>'edited_at']) !!}
</div> -->

@push('page_scripts')
    <script type="text/javascript">
        $('#edited_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>

    <script type="text/javascript">
        var path = "{{ url('wilayah/autocomplete') }}"; 

        $('#parent').typeahead({
            source: function(query, process) {
                var path = "{{ url('wilayah/autocomplete') }}";
                var $items = new Array;
                $items = [""];
                $.ajax({
                    url: path, 
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $.map(data, function(data){
                            var group;
                            group = {
                                id: data.id,
                                name: data.nama,                            
                                toString: function () {
                                    return JSON.stringify(this); 
                                },
                                toLowerCase: function () {
                                    return this.nama.toLowerCase();
                                },
                                indexOf: function (string) {
                                    return String.prototype.indexOf.apply(this.nama, arguments);
                                },
                                replace: function (string) {
                                    var value = '';
                                    value +=  this.nama; 
                                    return String.prototype.replace.apply('<div style="padding: 10px; font-size: 1.5em;">' + value + '</div>', arguments);
                                }
                            };
                            $items.push(group);
                        });

                        process($items);
                    }
                });
            },
            property: 'nama',
            items: 10,
            minLength: 2,
            updater: function (item) {
                var item = JSON.parse(item);
                console.log(item); 
                $('#id_parent').val(item.id);    
                $('#parent').val(item.name);       
                return item.name;
            }
        });
 
    </script>
@endpush