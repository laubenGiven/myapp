<x-guest-layout>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 mx-auto">
      <div class="flex justify-center me-6 mb-9 p-6">
         <img src="{{ Vite::asset('resources/images/logo.jpeg') }}" class="img-fluid rounded-circle" alt="Logo" style="width: 150px; height: 150px; border-radius: 50%;">

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="login-form mt-6">
          <h2 class="text-center mb-4 ml-4 font-extrabold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"> Clinician Login</h2>
          <form action="{{ route('loginClinician') }}" method="POST">
           @csrf
            <div class="form-group p-3">
            <label for="inputEmail">Email address</label>
             <input type="email" class="form-control " id="inputEmail" name="email" placeholder="Enter email address" required style="border-radius:20px">
            </div>
            <div class="form-group p-3">
             <label for="inputPassword">Password</label>
             <input type="password" class="form-control text-justify " id="inputPassword" name="password" placeholder=" Enter Password" required style="border-radius:20px">
            </div>
            <div>
            <button type="submit" class=" btn btn-primary  text-black font-bold py-2 px-4 rounded-full mt-4 w-full">Sign in</button>

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</x-guest-layout>