<?php $this->view('admin/inc/header', []); ?>  
    <main class="main-content">
        <section class="content-section">
            <div class="content-header">
                <h2>Users</h2>
                <div>

                    
                    <a href="<?=URL_ROOT?>/users/create" class="btn">add info</a>
                    <a href="<?=URL_ROOT?>/users/" class="btn">
                        <i class="fas fa-arrow-left"></i>
                        Go Back
                    </a>
                </div>
            </div>
   
            
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Images</th>
                            <th>Users Names</th>
                            <th>Email</th>                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>                
            </div>
            
        </section>
    </main>
<?php $this->view('admin/inc/footer', []); ?>