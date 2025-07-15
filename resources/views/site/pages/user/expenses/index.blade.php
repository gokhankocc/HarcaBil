@extends('site.layouts.main')
@section('title','Harcamalarım')
@section('content')
    <div class="geex-content__section geex-content__form table-responsive">

        <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
            <a href="{{ route('user.expenses.create') }}" class="geex-btn">
                <i class="uil-plus"></i> Yeni Harcama Ekle
            </a>
        </div>

        <table class="table-reviews-geex-1">
            <thead>
            <tr style="width: 100%;">
                <th style="width: 20%;">Tarih</th>
                <th style="width: 20%;">Kategori</th>
                <th style="width: 20%;">Tutar</th>
                <th style="width: 20%;">Açıklama</th>
                <th style="width: 20%;">İşlem</th>
            </tr>
            </thead>
            @if ($myExpenses->isEmpty())
                <p class="text-gray-600">Henüz harcama yapılmamış.</p>
            @else
                <tbody class="">
                @foreach ($myExpenses as $expense)
                    <tr>
                        {{--<td>
                            <div class="author-area">
                                <div class="profile-picture">
                                    <img src="assets/img/contact/01.png" alt="reviews">
                                </div>
                                <p>david millar</p>
                            </div>
                        </td>--}}
                        <td>
                            <span class="designation">{{ $expense->expense_date }}</span>
                        </td>
                        <td>
                            <span class="name">{{ $expense->category->name }}</span>
                        </td>
                        <td>
                            <span class="name">{{ number_format($expense->amount, 2) }} ₺</span>
                        </td>
                        <td>
                            <span class="designation">{{ $expense->description }}</span>
                        </td>
                        <td class="flex items-center space-x-2">
                            <!-- Düzenle Butonu (ikon) -->
                            <a href="{{ route('user.expenses.edit', $expense->id) }}"
                               class="text-purple-600 hover:text-purple-800 text-lg" style=" font-size: 20px">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            <!-- Sil Butonu (ikon) -->
                            <form action="{{ route('user.expenses.destroy', $expense->id) }}" method="POST"
                                  onsubmit="return confirm('Bu harcamayı silmek istediğine emin misin?')"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-lg" style="background: none; border: none; padding: 0; color: red; font-size: 20px">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
        <div style="margin-top: 30px; display: flex; justify-content: flex-end;">
            <div style="
        background-color: #fff;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        min-width: 300px;
        text-align: right;
    ">
                <div style="font-size: 14px; color: #999;">Toplam Harcama</div>
                <div style="font-size: 24px; font-weight: bold; color: #ed1c24;">
                    {{ number_format($myExpenses->sum('amount'), 2) }} ₺
                </div>
            </div>
        </div>

    </div>
@endsection
