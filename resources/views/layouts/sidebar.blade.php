


<div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
    <h3 class="text-center mb-4">Menu</h3>

    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard.index') }}" class="nav-link text-white">📊 Dashboard</a>
        </li>

        <li class="nav-item mb-2">
            <a href="{{ route('student.index') }}" class="nav-link text-white">👨‍🎓 Students</a>
        </li>

        <li class="nav-item mb-2">
            <a href="/teachers" class="nav-link text-white">👩‍🏫 Teachers</a>
        </li>

        <li class="nav-item mb-2">
            <a href="/classes" class="nav-link text-white">🏫 Classes</a>
        </li>
    </ul>
</div>
