<select name="centro_id" class="form-control" id="modalPacoteEdit-centro">
    @foreach($centros as $key => $val)
        <option value="{{$key}}" id="modalPacoteEdit-centro-option{{$key}}">{{$val}}</option>
    @endforeach                                
</select>