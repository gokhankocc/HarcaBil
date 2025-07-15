@extends('site.layouts.main')
@section('title','Aile Bireyleri')
@section('content')
    <div class="geex-content__section geex-content__form table-responsive">

        <!-- Modal Tetikleyici -->
        <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
            <button onclick="document.getElementById('modalOverlay').style.display='flex'" class="geex-btn">
                <i class="uil-plus"></i> Yeni Birey Ekle
            </button>
        </div>


        <table class="table-reviews-geex-1">
            <thead>
            <tr style="width: 100%;">
                <th style="width: 20%;">Adı Soyadı</th>
                <th style="width: 20%;">Tip</th>
                <th style="width: 20%;">İşlem</th>
            </tr>
            </thead>
            @if ($familyMembers->isEmpty())
                <p class="text-gray-600">Henüz aile bireyi eklenmemiş.</p>
            @else
                <tbody class="">
                @foreach ($familyMembers as $member)
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
                            <span class="designation">{{ $member->name }}</span>
                        </td>
                        <td>
                            <span class="name">
                                 @if($member->parent_id !=null)
                                    Aile Bireyi
                                @else
                                    Ana Kullanıcı
                                @endif
                            </span>
                        </td>
                        <td class="flex items-center space-x-2">
                            <!-- Düzenle Butonu (ikon) -->
                            <a href="{{--{{ route('user.expenses.edit', $member->id) }}--}}"
                               class="text-purple-600 hover:text-purple-800 text-lg" style=" font-size: 20px">
                                <i class="fas fa-pen-to-square"></i>
                            </a>

                            {{--<!-- Sil Butonu (ikon) -->
                            <form action="{{ route('user.expenses.destroy', $member->id) }}" method="POST"
                                  onsubmit="return confirm('Bu harcamayı silmek istediğine emin misin?')"
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-lg" style="background: none; border: none; padding: 0; color: red; font-size: 20px">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>

    </div>
    <!-- Modal Arka Plan -->
    <div id="modalOverlay" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.4); z-index: 9999; align-items: center; justify-content: center;">
        <!-- Modal Kutusu -->
        <div style="background: white; padding: 30px; border-radius: 10px; width: 100%; max-width: 500px; position: relative;">
            <!-- Kapat Butonu -->
            <button onclick="document.getElementById('modalOverlay').style.display='none'"
                    style="position: absolute; top: 10px; right: 15px; font-size: 22px; background: none; border: none; cursor: pointer;">&times;</button>

            <h3 style="font-size: 20px; margin-bottom: 20px;">Yeni Aile Bireyi Ekle</h3>

            <!-- Form -->
            <form action="{{ route('user.family.store') }}" method="POST" class="space-y-4">
                @csrf
                <label for="email" style="display: block; margin-bottom: 5px;">Ad Soyad</label>
                <div class="geex-content__form__single__box">
                    <input type="text" name="name" required
                           placeholder="Ad Soyad giriniz"
                           style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                </div>
                <label for="email" style="display: block; margin-bottom: 5px;">E-Posta</label>
                <div class="geex-content__form__single__box">
                    <input type="email" name="email" required
                           placeholder="E-mail giriniz"
                           style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                </div>
                <label for="email" style="display: block; margin-bottom: 5px;">Şifre</label>
                <div class="geex-content__form__single__box">
                    <input type="password" name="password" required
                           placeholder="Şifre giriniz"
                           style="width: 100%; padding: 10px 15px; border: 2px solid #dcdcdc; border-radius: 8px; font-size: 15px;" />
                </div>

                <!-- Buton -->
                <div class="geex-content__form__single" style="margin-top: 30px;">
                    <button type="submit"
                            style="background-color: #28a745; color: white; padding: 12px 20px; border-radius: 8px; border: none; font-size: 16px; cursor: pointer;">
                        <i class="uil uil-save"></i> Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
