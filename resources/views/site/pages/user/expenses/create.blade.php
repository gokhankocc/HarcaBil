@extends('site.layouts.main')
@section('title','Harcama Ekle')
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
            <form action="{{ route('user.expenses.store') }}" method="POST" class="geex-content__form__wrapper__item geex-content__form__left">
                @csrf

                <!-- Kategori -->
                <div class="geex-content__form__single">
                    <label for="category_id" class="geex-content__form__single__label">Kategori</label>
                    <div class="geex-content__form__single__box">
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Seçiniz</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <!-- Tutar -->
                <div class="geex-content__form__single">
                    <label for="amount" class="geex-content__form__single__label">Tutar (₺)</label>
                    <div class="geex-content__form__single__box">
                        <input type="number" name="amount" id="amount" step="0.01" required
                               placeholder="Örnek: 250.00"
                               style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                    </div>
                </div>
                <!-- Taksitli mi? -->
                <div class="geex-content__form__single">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <input type="checkbox" name="is_installment" id="is_installment" onclick="toggleInstallment()" />
                        <label for="is_installment" class="geex-content__form__single__label" style="margin: 0;">Taksitli Ödeme</label>
                    </div>
                </div>

                <!-- Taksit Alanları (başta gizli) -->
                <div id="installment_fields" style="display: none;">
                    <!-- Taksit Sayısı -->
                    <div class="geex-content__form__single">
                        <label for="installment_count" class="geex-content__form__single__label">Taksit Sayısı</label>
                        <div class="geex-content__form__single__box">
                            <input type="number" name="installment_count" min="1" id="installment_count" class="form-control" placeholder="Örn: 6" />
                        </div>
                    </div>

                    <!-- Örnek Taksit Listesi -->
                    <div class="geex-content__form__single">
                        <label class="geex-content__form__single__label">Taksit Önizleme</label>
                        <div id="installment_preview" style="padding: 10px; background: #f7f7f7; border-radius: 8px; border: 1px solid #ccc;">
                            <small style="color: #999;">Taksit bilgisi burada görüntülenecek...</small>
                        </div>
                    </div>
                </div>


                <!-- Açıklama -->
                <div class="geex-content__form__single">
                    <label for="description" class="geex-content__form__single__label">Açıklama</label>
                    <div class="geex-content__form__single__box">
                        <textarea name="description" id="description" rows="4"
                                  placeholder="İsteğe bağlı açıklama..."
                                  style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;"></textarea>
                    </div>
                </div>

                <!-- Tarih -->
                <div class="geex-content__form__single">
                    <label for="expense_date" class="geex-content__form__single__label">Tarih</label>
                    <div class="geex-content__form__single__box">
                        <input type="date" name="expense_date" id="expense_date" required
                               value="{{ date('Y-m-d') }}"
                               style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                    </div>
                </div>

                <!-- Buton -->
                <div class="geex-content__form__single" style="margin-top: 30px;">
                    <button type="submit"
                            style="background-color: #28a745; color: white; padding: 12px 20px; border-radius: 8px; border: none; font-size: 16px; cursor: pointer;">
                        <i class="uil uil-save"></i> Harcamayı Kaydet
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
    <script>
        $(document).ready(function () {
            $('#category_id').select2({
                placeholder: "Kategori seçin",
                allowClear: true,
                width: '100%'
            });
        });

        function toggleInstallment() {
            const isChecked = document.getElementById('is_installment').checked;
            document.getElementById('installment_fields').style.display = isChecked ? 'block' : 'none';
        }

        document.getElementById('installment_count').addEventListener('input', updateInstallments);
        document.getElementById('amount').addEventListener('input', updateInstallments);
        document.getElementById('expense_date').addEventListener('change', updateInstallments);

        function updateInstallments() {
            const count = parseInt(document.getElementById('installment_count').value);
            const totalAmount = parseFloat(document.getElementById('amount').value);
            const startDate = document.getElementById('expense_date').value;
            const preview = document.getElementById('installment_preview');

            if (!isNaN(count) && count > 0 && !isNaN(totalAmount) && startDate) {
                const monthly = (totalAmount / count).toFixed(2);
                const start = new Date(startDate);
                let html = '';

                for (let i = 0; i < count; i++) {
                    const current = new Date(start);
                    current.setMonth(current.getMonth() + i);

                    const day = current.getDate().toString().padStart(2, '0');
                    const month = (current.getMonth() + 1).toString().padStart(2, '0');
                    const year = current.getFullYear();

                    const formattedDate = `${day}.${month}.${year}`;
                    html += `<div style="margin-bottom: 5px;">${i + 1}. Taksit: <strong>${monthly} ₺</strong> - <span style="color:#666;">${formattedDate}</span></div>`;
                }

                preview.innerHTML = html;
            } else {
                preview.innerHTML = '<small style="color: #999;">Geçerli tutar, taksit sayısı ve tarih giriniz.</small>';
            }
        }
    </script>


@endsection
