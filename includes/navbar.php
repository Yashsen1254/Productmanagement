<!-- Start Topbar -->
<div class="h-[60px] bg-white dark:bg-dark dark:border-gray/20 border-b-2 border-lightgray/10 flex items-center justify-between gap-2.5 px-7">
                    <div class="sm:block hidden flex-auto">                        
                    </div>
                    <div class="flex items-center gap-5">
                    <div class="profile z-10" x-data="dropdown" @click.outside="open = false">
                            <button type="button" class="flex items-center gap-2.5" @click="toggle()">
                                <img class="h-[38px] w-[38px] rounded-full" src="<?= urlOf('assets/images/user.png') ?>" alt="Header Avatar">
                                <div class="text-start">
                                    <div class="flex items-center gap-1">
                                        <span class="hidden xl:block text-sm font-semibold">William Robbie</span>
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.29241 5.20759C0.901881 4.81707 0.90188 4.18391 1.29241 3.79338C1.68293 3.40286 2.31609 3.40286 2.70662 3.79338L5.99951 7.08627L9.2924 3.79338C9.68293 3.40286 10.3161 3.40286 10.7066 3.79338C11.0971 4.18391 11.0971 4.81707 10.7066 5.20759L6.70662 9.2076C6.31609 9.59812 5.68293 9.59812 5.2924 9.2076L1.29241 5.20759Z" fill="currentColor" />
                                        </svg>
                                    </div>
                                    <span class="hidden xl:block text-xs text-lightgray">CEO & Founder</span>
                                </div>
                            </button>
                            <ul x-show="open" x-transition="" x-transition.duration.300ms="" style="display: none;">
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="9.99996" cy="4.99984" r="3.33333" fill="currentColor" />
                                            <ellipse opacity="0.33" cx="9.99996" cy="14.1668" rx="5.83333" ry="3.33333" fill="currentColor" />
                                        </svg>
                                        Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z" fill="currentColor" />
                                            <path d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z" fill="currentColor" />
                                        </svg>
                                        Setting
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15 11.6667C15 15.3486 12.0152 18.3333 8.33329 18.3333C7.3037 18.3333 6.32863 18.0999 5.45809 17.6832C5.15888 17.5399 4.8199 17.4896 4.49945 17.5754L3.47775 17.8487C2.67247 18.0642 1.93575 17.3275 2.15122 16.5222L2.42459 15.5005C2.51033 15.1801 2.46004 14.8411 2.31679 14.5419C1.90002 13.6713 1.66663 12.6963 1.66663 11.6667C1.66663 7.98477 4.65139 5 8.33329 5C12.0152 5 15 7.98477 15 11.6667ZM5.41663 12.5C5.87686 12.5 6.24996 12.1269 6.24996 11.6667C6.24996 11.2064 5.87686 10.8333 5.41663 10.8333C4.95639 10.8333 4.58329 11.2064 4.58329 11.6667C4.58329 12.1269 4.95639 12.5 5.41663 12.5ZM8.33329 12.5C8.79353 12.5 9.16663 12.1269 9.16663 11.6667C9.16663 11.2064 8.79353 10.8333 8.33329 10.8333C7.87306 10.8333 7.49996 11.2064 7.49996 11.6667C7.49996 12.1269 7.87306 12.5 8.33329 12.5ZM11.25 12.5C11.7102 12.5 12.0833 12.1269 12.0833 11.6667C12.0833 11.2064 11.7102 10.8333 11.25 10.8333C10.7897 10.8333 10.4166 11.2064 10.4166 11.6667C10.4166 12.1269 10.7897 12.5 11.25 12.5Z" fill="currentColor" />
                                            <path opacity="0.3" d="M14.9868 12.0902C15.0767 12.053 15.1654 12.0134 15.2528 11.9716C15.4959 11.8552 15.7713 11.8143 16.0317 11.884L16.8618 12.1061C17.5161 12.2812 18.1147 11.6826 17.9396 11.0283L17.7175 10.1982C17.6479 9.9378 17.6887 9.66238 17.8051 9.41927C18.1437 8.71196 18.3334 7.91971 18.3334 7.08317C18.3334 4.09163 15.9082 1.6665 12.9167 1.6665C10.6583 1.6665 8.72276 3.04859 7.90967 5.01309C8.04977 5.0043 8.19105 4.99984 8.33337 4.99984C12.0153 4.99984 15 7.98461 15 11.6665C15 11.8088 14.9956 11.9501 14.9868 12.0902Z" fill="currentColor" />
                                        </svg>
                                        Message
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M1.87496 10C1.87496 5.51269 5.51265 1.875 9.99996 1.875C14.4873 1.875 18.125 5.51269 18.125 10V12.3272C18.1901 12.3042 18.2602 12.2917 18.3333 12.2917C18.6785 12.2917 18.9583 12.5715 18.9583 12.9167V14.5833C18.9583 14.9285 18.6785 15.2083 18.3333 15.2083C17.9881 15.2083 17.7083 14.9285 17.7083 14.5833V14.1667H16.875V10C16.875 6.20304 13.7969 3.125 9.99996 3.125C6.203 3.125 3.12496 6.20304 3.12496 10V14.1667H2.29163V14.5833C2.29163 14.9285 2.0118 15.2083 1.66663 15.2083C1.32145 15.2083 1.04163 14.9285 1.04163 14.5833V12.9167C1.04163 12.5715 1.32145 12.2917 1.66663 12.2917C1.73968 12.2917 1.8098 12.3042 1.87496 12.3272V10Z" fill="currentColor" />
                                            <path d="M6.66663 11.708C6.66663 11.0002 6.66663 10.6463 6.49189 10.4002C6.40396 10.2764 6.28724 10.1741 6.15102 10.1014C5.88034 9.95697 5.51475 9.99034 4.78357 10.0571C3.5515 10.1696 2.93546 10.2258 2.494 10.5337C2.27057 10.6896 2.083 10.8883 1.94308 11.1173C1.66663 11.5699 1.66663 12.1662 1.66663 13.3589V14.8086C1.66663 15.9894 1.66663 16.5798 1.9486 17.0357C2.05415 17.2064 2.18644 17.3603 2.34078 17.492C2.75315 17.8438 3.35507 17.9538 4.5589 18.1736C5.40606 18.3283 5.82965 18.4056 6.14226 18.2427C6.25762 18.1826 6.35958 18.1012 6.44235 18.0032C6.66663 17.7375 6.66663 17.322 6.66663 16.4911V11.708Z" fill="currentColor" />
                                            <path d="M13.3333 11.708C13.3333 11.0002 13.3333 10.6463 13.508 10.4002C13.596 10.2764 13.7127 10.1741 13.8489 10.1014C14.1196 9.95697 14.4852 9.99034 15.2164 10.0571C16.4484 10.1696 17.0645 10.2258 17.5059 10.5337C17.7294 10.6896 17.9169 10.8883 18.0568 11.1173C18.3333 11.5699 18.3333 12.1662 18.3333 13.3589V14.8086C18.3333 15.9894 18.3333 16.5798 18.0513 17.0357C17.9458 17.2064 17.8135 17.3603 17.6591 17.492C17.2468 17.8438 16.6449 17.9538 15.441 18.1736C14.5939 18.3283 14.1703 18.4056 13.8577 18.2427C13.7423 18.1826 13.6403 18.1012 13.5576 18.0032C13.3333 17.7375 13.3333 17.322 13.3333 16.4911V11.708Z" fill="currentColor" />
                                        </svg>
                                        Support
                                    </a>
                                </li>
                                <li>
                                    <a href="javaScript:;" class="!text-danger flex items-center gap-2">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M10.3564 1.6665C9.42824 1.6665 8.58294 2.16709 6.89234 3.16827L6.32055 3.50688C4.62995 4.50806 3.78465 5.00865 3.32055 5.83317C2.85645 6.6577 2.85645 7.65887 2.85645 9.66122V10.3385C2.85645 12.3408 2.85645 13.342 3.32055 14.1665C3.78465 14.991 4.62995 15.4916 6.32055 16.4928L6.89234 16.8314C8.58294 17.8326 9.42824 18.3332 10.3564 18.3332C11.2846 18.3332 12.1299 17.8326 13.8205 16.8314L14.3923 16.4928C16.0829 15.4916 16.9282 14.991 17.3923 14.1665C17.8564 13.342 17.8564 12.3408 17.8564 10.3385V9.66122C17.8564 7.65887 17.8564 6.6577 17.3923 5.83317C16.9282 5.00865 16.0829 4.50806 14.3923 3.50688L13.8205 3.16827C12.1299 2.16709 11.2846 1.6665 10.3564 1.6665Z" fill="currentColor" />
                                            <path d="M10.3564 6.875C8.63056 6.875 7.23145 8.27411 7.23145 10C7.23145 11.7259 8.63056 13.125 10.3564 13.125C12.0823 13.125 13.4814 11.7259 13.4814 10C13.4814 8.27411 12.0823 6.875 10.3564 6.875Z" fill="currentColor" />
                                        </svg>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    
                    </div>
                </div>
                <!-- End Topbar -->