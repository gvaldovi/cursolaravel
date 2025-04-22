<form action="{{route('save')}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" id="name" placeholder="Name">
    <input type="text" name="lastname" id="lastname" placeholder="Lastname">
    <input type="text" name="email" id="email" placeholder="Email">
    <input type="text" name="phone" id="phone" placeholder="Phone">
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="submit" value="Submit">
</form>