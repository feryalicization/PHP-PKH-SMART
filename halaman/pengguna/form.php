<div class="form-group">
	<div class="col-lg-3">
		<label>Nama</label>
	</div>
	<div class="col-lg-9">
		<input class="form-control" type="text" name="nama" placeholder="Nama" required="" value="<?php if(isset($data_pengguna)) echo $data_pengguna[0]['nama']; ?>" >
	</div>
</div>


<div class="form-group">
	<div class="col-lg-3">
		<label>Email</label>
	</div>
	<div class="col-lg-9">
		
		<input class="form-control" type="text" name="email" placeholder="Email" required="" value="<?php if(isset($data_pengguna)) echo $data_pengguna[0]['email']; ?>" >
	</div>
</div>



<div class="form-group">
	<div class="col-lg-3">
		<label>Username</label>
	</div>
	<div class="col-lg-9">
		<input class="form-control" type="text" name="username" placeholder="Username" required="" value="<?php if(isset($data_pengguna)) echo $data_pengguna[0]['username']; ?>">
	</div>
</div>

<div class="form-group">
	<div class="col-lg-3">
		<label>Password</label>
	</div>
	<div class="col-lg-9">
		
		<input class="form-control" type="password" name="password" placeholder="Password" required="" value="<?php if(isset($data_pengguna)) echo $data_pengguna[0]['password']; ?>" >
	</div>
</div>


<div class="form-group">
	<div class="col-lg-3">
		<label>Level</label>
	</div>
	<div class="col-lg-9">
		
		<input class="form-control" type="text" name="level" placeholder="Level" required="" value="<?php if(isset($data_pengguna)) echo $data_pengguna[0]['level']; ?>" >
	</div>
</div>


<input type="hidden" name="level" value="Petugas">
