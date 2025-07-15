@extends('site.layouts.main')
@section('title','Harcama Düzenle')
@section('content')
    <style>
        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 2px solid #dcdcdc;
            border-radius: 8px;
            padding: 8px 12px;
            height: 45px;
            font-size: 15px;
            color: #333;
            box-shadow: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 45px;
            right: 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 28px;
            color: #333;
        }

        .select2-dropdown {
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .select2-search__field {
            padding: 6px 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .select2-results__option--highlighted {
            background-color: #7d4ac7 !important; /* mor tema */
            color: white;
        }

        .select2-results__option {
            padding: 8px 12px;
        }
    </style>


    <div class="geex-content__section geex-content__form">
        <div class="geex-content__form__wrapper">
            <form action="{{ route('user.expenses.update', $expense->id) }}" method="POST" class="geex-content__form__wrapper__item geex-content__form__left">
                @csrf @method('PUT')

                <!-- Kategori -->
                <div class="geex-content__form__single">
                    <label for="category_id" class="geex-content__form__single__label">Kategori</label>
                    <div class="geex-content__form__single__box">
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Seçiniz</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected($category->id == $expense->category_id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <!-- Tutar -->
                <div class="geex-content__form__single">
                    <label for="amount" class="geex-content__form__single__label">Tutar (₺)</label>
                    <div class="geex-content__form__single__box">
                        <input type="number" name="amount" id="amount" step="0.01" required
                               placeholder="Örnek: 250.00" value="{{ old('amount', $expense->amount) }}"
                               style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                    </div>
                </div>

                <!-- Açıklama -->
                <div class="geex-content__form__single">
                    <label for="description" class="geex-content__form__single__label">Açıklama</label>
                    <div class="geex-content__form__single__box">
                        <textarea name="description" id="description" rows="4"
                                  placeholder="İsteğe bağlı açıklama..."
                                  style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;">{{ old('description', $expense->description) }}</textarea>
                    </div>
                </div>

                <!-- Tarih -->
                <div class="geex-content__form__single">
                    <label for="expense_date" class="geex-content__form__single__label">Tarih</label>
                    <div class="geex-content__form__single__box">
                        <input type="date" name="expense_date" id="expense_date" required
                               value="{{ old('expense_date', $expense->expense_date) }}"
                               style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                    </div>
                </div>

                <!-- Buton -->
                <div class="geex-content__form__single" style="margin-top: 30px;">
                    <button type="submit"
                            style="background-color: #28a745; color: white; padding: 12px 20px; border-radius: 8px; border: none; font-size: 16px; cursor: pointer;">
                        <i class="uil uil-save"></i> Harcamayı Güncelle
                    </button>
                </div>
            </form>

            <!-- Sağ Kolon boş bırakıldı (isteğe bağlı içerik için) -->
            <div class="geex-content__form__wrapper__item geex-content__form__right">
                <!-- İstatistik, not vs. koyabiliriz -->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('#category_id').select2({
                placeholder: "Kategori seçin",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection
