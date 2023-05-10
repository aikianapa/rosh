<html>
    <select name class="form-control" wb-select2 placeholder="Специалисты">
        <wb-foreach wb="table=users&sort=name" wb-filter="active=on&role=expert">
            <option value="{{_id}}" selected wb-if="'{{in_array({{_id}},{{_parent._parent.tags}})}}'=='1'">
                {{header}}</option>
            <option value="{{_id}}" wb-if="'{{in_array({{_id}},{{_parent._parent.tags}})}}'!='1'">
                {{header}}</option>
        </wb-foreach>
    </select>
</html>