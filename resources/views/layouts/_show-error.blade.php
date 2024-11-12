 @error($field_name)
     @foreach ($errors->get($field_name) as $error)
         <li class="invalid-feedback">{{ $error }}</li>
     @endforeach
 @enderror
