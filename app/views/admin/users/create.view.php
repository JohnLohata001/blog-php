<?php $this->view('admin/inc/header', []); ?>  
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <h2>Insert New User</h2>
                <a href="<?=URL_ROOT?>/users/" class="btn">
                    <i class="fas fa-arrow-left"></i>
                    Go Back
                </a>
            </div>
   
            
            <div class="table-container">

                <div class="form-users">
                    <div class="content-all">
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="form-user-inputs">
                                    <div class="img-preview"></div>
                                    <div>
                                        <label for="image" class="btn-img-select">Profile Image:</label>
                                        <input type="file" id="image" name="image" class="input-user">
                                    </div>
                                    <div>
                                        <label for="name">User Fullname:</label>
                                        <input type="text" id="name" name="name" class="input-user">   
                                    </div>
                                    <div>
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" class="input-user" required>
                                    </div>
                                </div>                            
                                <div>
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" class="input-user">
                                </div>
                                <div>
                                    <label for="role">Role:</label>
                                    <select id="role" name="role" class="input-user">
                                        <option value="admin">Admin</option>
                                        <option value="editor">Editor</option>
                                        <option value="subscriber">Subscriber</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="status">Status:</label>
                                    <select id="status" name="status" class="input-user">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div>
                                    <br>
                                    <button type="submit" class="btn">Insert User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            
        </section>
    </main>
    <script>
        const imageInput = document.getElementById('image');
        const imgPreview = document.querySelector('.img-preview');

        imageInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.innerHTML = `<img src="${e.target.result}" alt="Image Preview" style="object-fit: cover; width: 200px; height: 150px; padding:10px ">`;
                }
                reader.readAsDataURL(file);
            } else {
                imgPreview.innerHTML = '';
            }
        });
    </script>
<?php $this->view('admin/inc/footer', []); ?>