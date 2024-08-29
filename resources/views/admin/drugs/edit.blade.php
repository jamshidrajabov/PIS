@extends('admin.app')
@section('title','Dori Tahrirlash')
@section('page','Dori tahrirlash')
@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
             <!-- general form elements -->
             <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Tahrirlash</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('drug.update',['id'=>$drug->id])}}" role="form" method="POST">
                    @csrf
                    @method('put')
                  <div class="box-body">
                    <div class="form-group col-md-6">
                      <label for="name">Dori nomi</label>
                      <input name="name" type="name" class="form-control" id="name" autocomplete="off" value="{{$drug->name}}">
                        @error('name')
                            <div style="color: red; font:bold; margin-top:10px" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group position-relative col-md-6">
                        <label for="category">Kategoriya</label>
                        <input type="text" class="form-control" id="category" name="category" autocomplete="off" required value="{{$drug->category->name}}">
                        <div id="suggestions" class="suggestions col-xs-11" style="border: 1px solid #ccc; display: none; position: absolute; background-color: white; z-index: 1000;"></div>
                    </div>
                    <div class="form-group ">
                        <label  for="description">Dori tavsifi | <span style="color:rgb(71, 160, 71)">HTML kod kiritiladi!</span></label>
                        <div id="editor" style="height: 300px;">{{$drug->description}}</div>
                        <textarea class="form-control" id="description" name="description" style="display:none;" >{{$drug->description}}</textarea>
                        @error('description')
                        <div style="color: red; font:bold; margin-top:10px" class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        
                        <div id="livePreview" style="border: 1px solid #ccc; padding: 10px; margin-top: 20px;">
                            <strong>Jonli Preview:</strong>
                            <div id="previewContent"></div>
                        </div>
                    </div>

                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                  </div>
                </form>
                
                
              </div><!-- /.box --> 
                
        </div>
    </div>
</section>
@endsection
<!-- Boshqa kutubxonalar -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Ace Editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/ace.js"></script>
<script>
    $(document).ready(function() {
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/terminal"); // Oq fonli tema
    editor.session.setMode("ace/mode/html"); // HTML rejimini yoqing
    
    const descriptionTextarea = document.getElementById('description');

    // Formani yuborishdan oldin textarea ga editordagi kodni kiritish
    $('form').on('submit', function() {
        descriptionTextarea.value = editor.getValue();
    });

    editor.setOptions({
        highlightActiveLine: true,
    });

    // HTML kodni jonli ko'rsatish
    editor.session.on('change', function() {
        var htmlContent = editor.getValue();
        var previewDiv = document.getElementById('previewContent');
        
        // HTML kodni ko'rsatish
        previewDiv.innerHTML = htmlContent;
    });
});
</script>
<style>
    #editor {
    width: 100%; /* To'liq kenglikni oling */
    height: 300px; /* Balandlik */
}
.ace_editor {
    background-color: #fff !important; /* Oq fon */
        color: #000 !important; /* Qora matn */
        border: 2px solid #007bff; /* Chiroyli border */
        border-radius: 5px; /* Yumshoq burchaklar */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soyalar */
    }
    .ace_cursor {
        background-color: #007bff !important; /* Kursor rangini o'zgartirish */
    }
.ace_gutter {
    background: #f0f0f0 !important; /* Nomerlar qismi foni */
        color: #a39292 !important; /* Nomerlar rang */
}

.ace_line {
        background: transparent !important; /* Qator fonini shaffof qilish */
    }

.ace_marker-layer .ace_active-line {
        background: rgba(0, 123, 255, 0.4) !important; /* Kursor turgan qator fon rangini o'zgartirish */
        color: #000 !important; /* Matn rangini qora qilish */
    }
.ace_marker-layer .ace_active-line {
    background: rgba(0, 123, 255, 0.4); /* Kursor turgan qator foni */
    color: #000; /* Matn rangini qora qilish */
}



</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryInput = document.getElementById('category');
    const suggestionsDiv = document.getElementById('suggestions');
    const previewContent = document.getElementById('previewContent');
    let debounceTimer; // Debounce timer o'zgaruvchisi

    categoryInput.addEventListener('input', function() {
        clearTimeout(debounceTimer); // Oldingi timerni tozalash
        const query = this.value.toLowerCase();

        debounceTimer = setTimeout(() => {
            suggestionsDiv.innerHTML = ''; // Takliflarni tozalash
            suggestionsDiv.style.display = 'none'; // Takliflar ko'rinmasin

            if (query.length > 0) {
                fetch(`/categories/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            suggestionsDiv.style.display = 'block'; // Takliflar ko'rsatiladi
                            data.forEach(category => {
                                const suggestion = document.createElement('div');
                                suggestion.textContent = category.name; // Kategoriyaning nomi
                                suggestion.className = 'suggestion-item';
                                suggestion.style.cursor = 'pointer';
                                suggestion.style.padding = '8px'; // Taklif elementlari uchun qoshimcha bo'shliq
                                suggestion.style.borderBottom = '1px solid #ccc'; // Takliflar o'rtasidagi chegara
                                
                                suggestion.addEventListener('click', function() {
                                    categoryInput.value = category.name; // Tanlangan kategoriyani inputga qo'yish
                                    suggestionsDiv.innerHTML = ''; // Takliflarni tozalash
                                    suggestionsDiv.style.display = 'none'; // Takliflar ko'rinmasin
                                });
                                suggestionsDiv.appendChild(suggestion);
                            });
                        }
                    })
                    .catch(error => console.error('Error fetching suggestions:', error)); // Xato xabarini ko'rsatish
            }
        }, 300); // 300 millisekund kutish
    });

    // Tashqi joyga bosilganda takliflarni yashirish
    document.addEventListener('click', function(event) {
        if (!suggestionsDiv.contains(event.target) && event.target !== categoryInput) {
            suggestionsDiv.innerHTML = '';
            suggestionsDiv.style.display = 'none';
        }
    });
});

</script>

<style>
    .suggestions {
        max-height: 150px;
        overflow-y: auto;
        width: calc(100% - 2px);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .suggestion-item {
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    .suggestion-item:hover {
        background-color: #f0f0f0;
    }
</style>