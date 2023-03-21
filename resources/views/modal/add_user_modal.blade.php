
  
  <!-- Modal -->
  <div class="modal fade" id="update_modal" tabindex="-1" aria-labelledby="update_modalLabel" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content " style="background-color: rgb(127, 113, 113)">
        <div class="modal-body " style="border-radius: 20px">
            <form action="{{ route('add_user') }}" method="post" class="p-3 text-white" style="">
                @csrf
                <div class="form-group">
                    <label for="FirstName" class="form-label" >First Name</label>
                    <input type="text" name="fname" class="form-control" placeholder="e.g Ryle" value="{{old('fname')}}">
                    
                    <span class="text-danger">@error('fname') {{$message}}  @enderror</span>
                    
                </div>
                <div class="form-group">
                    <label for="Lastname" class="form-label">Last Name</label>
                    <input type="text" name="lname" class="form-control" placeholder="e.g Fuentes" value="{{old('lname')}}">
                    <span class="text-danger">@error('lname') {{$message}}  @enderror</span>
                </div>
                <div class="form-group">
                    <label for="Email" class="form-label">Email</label>
                    <div class="input-group">
                        
                        <span class="input-group-text bg-warning">
                            <i class="bi bi-envelope-at" style="color:white"></i>
                        </span>
                        <input type="text" name="email" class="form-control" placeholder="e.g rylefuentes09@gmail.com" value="{{old('email')}}">
                    </div>
                    <span class="text-danger">@error('email') {{$message}}  @enderror</span>
                </div>
                <div class="form-group mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" >
                    <span class="text-danger">@error('password') {{$message}}  @enderror</span>
                </div>
                

                <div class=" text-center">

                    <button type="submit" class="btn btn-warning text-white">Add User!</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>