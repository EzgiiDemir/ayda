import { TreatmentsSectionDTO } from "@/lib/cms";
export default function TreatmentsSection({ data, locale }: { data: TreatmentsSectionDTO; locale: string }) {

    return (
        <section
            className="py-7 md:py-14"
            style={{
                backgroundImage: `linear-gradient(90deg, rgba(255, 255, 255, 0.68), rgba(255, 255, 255, 0.68)), url(/images/logoonly.svg);`,
                backgroundRepeat: "no-repeat",
                backgroundPosition: "center center",
                backgroundSize: "auto 80%",
            }}
        >
            <div className="container flex flex-col items-center">
                <p className="text-sm md:text-base text-ayda-pink-dark uppercase text-center font-medium">
                    {data.subtitle}
                </p>

                <p className="text-ayda-black capitalize text-2xl md:text-3xl font-medium tracking-wide text-center mb-2">
                    {data.title}
                </p>

                <div className="text-sm md:text-base text-ayda-gray-dark text-center max-w-3xl">
                    {data.intro && <p dangerouslySetInnerHTML={{ __html: data.intro }} />}
                    {data.intro2 && <p className="mt-2" dangerouslySetInnerHTML={{ __html: data.intro2 }} />}
                </div>

                <div className="flex gap-4 justify-center items-center flex-wrap max-w-[700px] mx-auto mt-6">
                    {data.treatments.map((t) => (
                        <a
                            key={t.slug}
                            href={`/${locale}/tedaviler/${t.slug}`}
                            className="text-xs md:text-sm text-ayda-gray-dark font-medium flex gap-1 items-center"
                        >
                            <svg className="w-4 h-4 text-ayda-pink-dark" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true">
                                <path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5 12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4z" />
                            </svg>
                            <p className="text-center hover:text-ayda-pink-dark transition-colors duration-300 ease-in cursor-pointer">
                                {t.label}
                            </p>
                        </a>
                    ))}
                </div>

                {data.ctaText && data.ctaLink && (
                    <a
                        className="bg-ayda-pink-dark px-5 md:px-8 py-2 md:py-4 rounded-full cursor-pointer hover:bg-ayda-blue transition-colors duration-300 ease-in mt-4 md:mt-6 flex items-center justify-center"
                        href={data.ctaLink}
                    >
                        <span className="text-sm md:text-base text-ayda-white capitalize font-medium">{data.ctaText}</span>
                    </a>
                )}
            </div>
        </section>
    );
}
