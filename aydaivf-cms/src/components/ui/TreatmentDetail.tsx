// src/components/ui/TreatmentDetail.tsx
import { TreatmentDTO } from "@/lib/cms";

export default function TreatmentDetail({ data }: { data: TreatmentDTO }) {
    const hero = data.heroImage ?? "https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png";
    const dots = "/images/dots.png";

    return (
        <main className="flex-1 flex flex-col">
            <section className="h-[calc(70dvh-80px)] md:h-[calc(100dvh-80px)] relative">
                <div className="swiper mySwiper !w-full !h-full !z-30 swiper-horizontal swiper-backface-hidden">
                    <div className="swiper-wrapper">
                        <div className="swiper-slide w-full h-full swiper-slide-active">
                            <div
                                className="w-full h-full"
                                style={{
                                    backgroundImage: `url("${dots}"), url("${hero}")`,
                                    backgroundRepeat: "repeat, no-repeat",
                                    backgroundPosition: "left top, center center",
                                    backgroundSize: "auto, cover",
                                }}
                            />
                        </div>
                    </div>
                </div>

                <div className="z-30 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                    <p className="text-2xl breakpoint-500:text-3xl md:text-6xl text-ayda-pink-dark text-center font-medium">
                        {data.title}
                    </p>
                </div>

                <div className="flex flex-col sm:flex-row gap-1 items-start sm:gap-0 sm:justify-between absolute bottom-[5px] w-full px-4">
                    <p className="z-30 capitalize text-xs md:text-sm text-ayda-white font-medium">
                        Ayda IVF Center
                    </p>
                </div>
            </section>

            <div className="container flex flex-col gap-5 py-5 md:py-10">
                {data.intro ? (
                    <div className="text-sm md:text-base text-ayda-gray-dark">
                        <div dangerouslySetInnerHTML={{ __html: data.intro }} />
                    </div>
                ) : null}

                {data.content ? (
                    <div className="text-sm md:text-base text-ayda-gray-dark">
                        <div dangerouslySetInnerHTML={{ __html: data.content }} />
                    </div>
                ) : null}

                {data.sections?.map((s, i) => (
                    <div key={i} className="flex flex-col gap-3">
                        {s.heading ? (
                            <p className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                {s.heading}
                            </p>
                        ) : null}
                        {s.html ? (
                            <div className="text-sm md:text-base text-ayda-gray-dark">
                                <div dangerouslySetInnerHTML={{ __html: s.html }} />
                            </div>
                        ) : null}
                    </div>
                ))}
            </div>
        </main>
    );
}
