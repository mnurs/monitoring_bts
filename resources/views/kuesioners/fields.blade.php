<!-- Pertanyaan Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('pertanyaan', 'pertanyaan:') !!}
    {!! Form::textarea('Pertanyaan', null, ['class' => 'form-control']) !!}
</div>

<!-- Jawaban Field -->
<!-- <div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('jawaban', 'jawaban:') !!}
    {!! Form::textarea('Jawaban', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Created By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    $input['created_by'] = $nameUser;
</div> -->

<!-- Edited By Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_by', 'Edited By:') !!}
    $input['edited_by'] = $nameUser;
</div> -->

<!-- Edited At Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('edited_at', 'Edited At:') !!}
    {!! Form::text('edited_at', null, ['class' => 'form-control','id'=>'edited_at']) !!}
</div>
 -->

    public function store(CreateMonitoringRequest $request)
    {
        $input = $request->all();

        $nameUser = $request->session()->get('name'); 
        $input['created_by'] = $nameUser; 
        $monitoring = $this->monitoringRepository->create($input);

        Flash::success('Monitoring saved successfully.');

        return redirect(route('monitorings.index'));
    }

    public function update($id, UpdateMonitoringRequest $request)
    {
        $input = $request->all();
        $monitoring = $this->monitoringRepository->find($id);

        if (empty($monitoring)) {
            Flash::error('Monitoring not found');

            return redirect(route('monitorings.index'));
        }

        $nameUser = $request->session()->get('name'); 
        $now = new DateTime(); 
        $input['edited_by'] = $nameUser;
        $input['edited_at'] = $now;
        $monitoring = $this->monitoringRepository->update($input, $id);

        Flash::success('Monitoring updated successfully.');

        return redirect(route('monitorings.index'));
    }



@push('page_scripts')
    <script type="text/javascript">
        $('#edited_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush