<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="" method="POST">
            @csrf
            @method('POST')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control" name="name" id="userName" placeholder="Nama"
                            aria-describedby="nameHelp" required>
                        <label for="userName">Nama</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="email" class="form-control" name="email" id="userEmail" placeholder="Email"
                            aria-describedby="emailHelp" required>
                        <label for="userEmail">Email</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input type="password" class="form-control" name="password" id="userPassword"
                            placeholder="Password" aria-describedby="passwordHelp">
                        <label for="userPassword">Password</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password_confirmation"
                            id="userConfrimPassword" placeholder="Konfirmasi Password"
                            aria-describedby="confirmPasswordHelp">
                        <label for="userConfrimPassword">Konfirmasi Password</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
