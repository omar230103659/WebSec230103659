<nav class="navbar navbar-expand-sm bg-light">
 <div class="container-fluid">
 <ul class="navbar-nav">
 <li class="nav-item">
 <a class="nav-link" href="./">Home</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="./even">Even Numbers</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="./prime">Prime Numbers</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="./multable">Multiplication Table</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="./minitest">Mini Test</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="./transcript">Transcript</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="{{ url('/products') }}">Products</a>
 </li>
 <li class="nav-item">
 <a class="nav-link {{ Request::is('calculator') ? 'active' : '' }}" href="{{ url('/calculator') }}">Calculator</a>
 </li>
 <li class="nav-item">
 <a class="nav-link" href="{{ url('/calculate-gpa') }}">Calculate GPA</a>
 </li>
 <li class="nav-item">
                <a class="nav-link" href="{{ url('/users') }}">Users</a>
            </li>
 <li class="nav-item">
        <a class="nav-link" href="{{ route('grades.index') }}">Grades</a>
    </li>
 </ul>           
 </ul>
 </div>
</nav>