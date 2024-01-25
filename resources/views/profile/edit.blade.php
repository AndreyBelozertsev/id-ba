<x-app-layout>
    <div class="py-12">
        <div class="xl:max-w-[60%] mx-auto bg-form-bg rounded-2xl py-8 px-2 lg:px-10 grid gap-8">
            <!-- Tabs -->
            <div class="tabs"
                x-data="{ activeTab: '1'}"
            >
                <ul class="flex gap-4 overfolw-x-hidden border-b-2 border-default h-[62px]">
                    <li class="tabs-item">
                        <button
                            @click.prevent="activeTab = '1'"
                            :class="{ '_is-active': activeTab === '1' }"
                            class="tabs-button h-full text-btn-sec-21 text-base lg:text-xl"
                            type="button"
                        >
                            Моя информация
                        </button>
                    </li>
                    <li class="tabs-item">
                        <button
                            @click.prevent="activeTab = '2'"
                            :class="{ '_is-active': activeTab === '2' }"
                            class="tabs-button h-full text-btn-sec-21 text-base lg:text-xl"
                            type="button"
                        >
                            Сменить пароль
                        </button>
                    </li>
                    <li class="tabs-item">
                        <button
                            @click.prevent="activeTab = '3'"
                            :class="{ '_is-active': activeTab === '3' }"
                            class="tabs-button h-full text-btn-sec-21 text-base lg:text-xl"
                            type="button"
                        >
                            Мои идеи
                        </button>
                    </li>
                </ul>
                <div class="tabs-content">
                    <div x-show="activeTab === '1'" class="tab-panel" style="display: none">
                        <div class="tabs-body">
                            <div class="p-4 sm:p-8 sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="activeTab === '2'" class="tab-panel" style="display: none">
                        <div class="tabs-body">
                            <div class="p-4 sm:p-8 sm:rounded-lg">
                                <div class="max-w-xl">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="activeTab === '3'" class="tab-panel" style="display: none">
                        <div class="tabs-body">
                            <div class="p-4 sm:p-8 sm:rounded-lg">
                                <div class="">
                                    @include('profile.partials.idea-profile')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
