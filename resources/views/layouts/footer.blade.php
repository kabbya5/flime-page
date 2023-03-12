<footer class="footer" style="background-image: url({{ asset('image/Bg.png')}});">
    <div class="container mx-auto py-10 md:py-[120px]">
        <div class="flex flex-wrap justify-around">
            <div class="mx-4 mb-6">
                <div class="flex flex-col">
                    <a href="#" class="flex items-center">
                        <img src="{{ asset('image/Capture.png')}}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo" />
                        <span class="self-center text-sm md:text-md font-semibold whitespace-nowrap text-black"> চলচ্চিত্র ও প্রকাশনা অধিদপ্তর  </span>
                    </a>
                    <div class="w-[250px] ml-[60px]">
                        <p class="font-[600] mt-4 text-[#4e4e51] text-sm">
                            চলচ্চিত্র ও প্রকাশনা অধিদপ্তর (ডিএফপি)
                            ১১২ সার্কিট হাউস রোড,
                            তথ্য ভবন, ঢাকা। 
                        </p> 
                    </div>
                </div>
            </div>

            <div class="mx-4 mb-8 mt-0 md:mt-2">
                <a href="#" class="flex">
                    <span class="self-center text-sm md:text-md font-semibold whitespace-nowrap text-black"> {{ $sections[0]->section_name }} </span>
                </a>
                <div>
                    @foreach ($sections[0]->subsections as $subsection)
                        <a href="{{ route('video.subsection.posts',$subsection->slug) }}" class="block text-black mt-2">{{ $subsection->subsection_name }}</a>
                    @endforeach
                    
                </div>
            </div>
            <div class="mx-4 mb-8 mt-0 md:mt-2">
                <a href="#" class="flex">
                    <span class="self-center text-sm md:text-md font-semibold whitespace-nowrap text-black"> {{ $sections[1]->section_name}}</span>
                </a>
                <div class="w-48">
                    @foreach ($sections[1]->subsections as $subsection)
                    <a href="{{ route('book.subsection.posts',$subsection->slug) }}" class="block text-black mt-2">{{ $subsection->subsection_name }}</a>
                    @endforeach
                   
                </div>
            </div>
                   
            <div class="mx-4 mt-0 md:mt-2">
                <a href="#" class="flex">
                    <span class="self-center text-sm md:text-md font-semibold whitespace-nowrap text-black"> নিবন্ধন, বিজ্ঞাপন ও নিরীক্ষা  </span>
                </a>
                <div>
                    @foreach ($sections[2]->subsections as $subsection)
                    @if($subsection->subsection_position === 1)
                        
                        <a href="{{ route('all.media.news') }}" class="block text-black mt-2">{{ $subsection->subsection_name }}</a>
                         
                    @else
                        
                        <a href="{{ route('media.form') }}" class="block text-black mt-2">{{ $subsection->subsection_name }}</a>
                        
                    @endif                      
                    @endforeach 
                    
                    <a href="{{ route('new.clearence.form') }}" class="block text-black mt-2">
                        পত্রিকা নামের ছাড়পত্র
                    </a>  
                </div>
            </div>
        </div>
    </div>
</footer>
