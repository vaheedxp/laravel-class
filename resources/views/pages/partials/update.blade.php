<form action="{{asset('students/update')}}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{$sdt->id}}">
  <div class="form-group">
    <label for="name">Name</label>
    <input 
      type="text" 
      class="form-control" id="name" 
      placeholder="Enter student name" 
      name="name"
      value="{{$sdt->name}}">
  </div>
  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter student lastname" 
    name="lastname"
    value="{{$sdt->lastname}}">
  </div>
   <div class="form-group">
    <label for="phone">Phone</label>
    <input type="text" class="form-control" id="phone" placeholder="Enter student phone" 
    name="phone"
    value="{{$sdt->phone}}">
  </div>
  <button type="submit" class="btn btn-primary">Save</button>
</form>