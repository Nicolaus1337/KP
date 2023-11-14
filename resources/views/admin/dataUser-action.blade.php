<div class="modal-content">
    <form id="formAction" action="{{ $data_user->id ?  route('data_user.update', $data_user->id) : route('data_user.store')}}" method="post">
    @csrf
    @if ($data_user->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="column">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">NPK</label>
                    <input type="text" placeholder="NPK" value="{{ $data_user->npk }}" name="npk" class="form-control" id="npk">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Name</label>
                    <input type="text" placeholder="Name" value="{{ $data_user->name }}" name="name" class="form-control" id="name">
                </div>
            </div>
            

            <div class="col-md-8">
            <label class="form-label">Unit Kerja</label>
                <select class="form-select mb-3" aria-label="Default select example" name="unit_kerja" id="unit_kerja">
                    @foreach($unitkerjas as $unitkerja)
                    <option value="{{ $unitkerja->nama_unit_kerja }}" name="unit_kerja" id="unit_kerja">{{ $unitkerja->nama_unit_kerja }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    
                    <label for="basicInput" class="form-label">Email</label>
                    <input type="email" placeholder="Email" value="{{ $data_user->email }}" name="email" class="form-control" id="email">
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    
                    <label for="basicInput" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="text" placeholder="Password" name="password" class="form-control" id="password">
                    <div class="input-group-append">
                        <button class="btn btn-primary generate-password" type="button">Generate</button>
                    </div>
                    </div>
                </div>
            </div>

            

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Confirm Password</label>
                    <input type="text" placeholder="Password"  name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
            </div>
            



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>

<script>
    
    $(document).ready(function(){

        function generateRandomPassword() {
                const alphabet = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                const numbers = "0123456789";
                
                const firstChar = alphabet.charAt(Math.floor(Math.random() * alphabet.length));

                
                const secondChar = numbers.charAt(Math.floor(Math.random() * numbers.length));

              
                const remainingLength = 6;
                const charset = alphabet + numbers ;
                let password = firstChar + secondChar;
                for (let i = 0; i < remainingLength; i++) {
                    const randomIndex = Math.floor(Math.random() * charset.length);
                    password += charset.charAt(randomIndex);
                }

                
                password = shuffleString(password);

                return password;
                }

                
                function shuffleString(str) {
                const array = str.split("");
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
                return array.join("");
                }

        $('.generate-password').on('click', function(){

            let password = generateRandomPassword();

            $('#password').val(password);
            $('#password_confirmation').val(password);
           
            
        });
    });
    
</script>