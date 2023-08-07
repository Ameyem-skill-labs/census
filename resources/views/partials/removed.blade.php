@can('currency_access')
                    <li class="{{ $request->segment(2) == 'currencies' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.currencies.index') }}">
                            <i class="fa fa-gears"></i>
                            <span class="title">
                                @lang('quickadmin.currency.title')
                            </span>
                        </a>
                    </li>
                    @endcan