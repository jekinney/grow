<nav class="sidebar-nav ps">
	
	<ul class="nav">
		
		<li class="nav-item nav-dropdown">
			<a href="#" class="nav-link nav-dropdown-toggle">Videos</a>
			<ul class="nav-dropdown-items">
				<li class="nav-item">
					<a href="{{ route( 'dash.video.index' ) }}" class="nav-link">List</a>
				</li>
				<li class="nav-item">
					<a href="{{ route( 'dash.video.create' ) }}" class="nav-link">Add</a>
				</li>
			</ul>
		</li>
		
		<li class="nav-item nav-dropdown">
			<a href="#" class="nav-link nav-dropdown-toggle">Courses</a>
			<ul class="nav-dropdown-items">
				<li class="nav-item">
					<a href="{{ route( 'dash.course.index' ) }}" class="nav-link">List</a>
				</li>
				<li class="nav-item">
					<a href="{{ route( 'dash.course.create' ) }}" class="nav-link">Add Course</a>
				</li>
				<li class="nav-item">
					<a href="{{ route( 'dash.subcourse.create' ) }}" class="nav-link">Add Subcourse</a>
				</li>
			</ul>
		</li>

	</ul>

</nav>