// src/app/[locale]/page.tsx
import Hero from "@/components/Hero";
import {
    Locale,
    getHero,
    getWelcome,
    getTreatmentsSection,
    getShowcase,
} from "@/lib/cms";

const API_BASE = (process.env.NEXT_PUBLIC_API ?? "").replace(/\/+$/, "");
const abs = (u?: string | null) =>
    !u ? "" : u.startsWith("http") ? u : `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;

export default async function HomePage({ params }: { params: { locale: Locale } }) {
    const lang = params.locale;
    const [hero, welcome, ts, showcase] = await Promise.all([
        getHero(lang),
        getWelcome(lang),
        getTreatmentsSection(lang),
        getShowcase(lang),
    ]);

    // showcase API tek obje veya dizi olabilir
    const showcaseItems = Array.isArray(showcase) ? showcase : [showcase].filter(Boolean);

    return (
        <main className="flex-1 flex flex-col">
            {/* HERO */}
            <Hero
                locale={lang}
                title={hero.title}
                subtitle={hero.subtitle}
                workhours={hero.workhours}
                footerText={hero.footerText}
                background={abs(hero.background)}
                dots={abs(hero.dots)}
            />

            {/* WELCOME / INTRO */}
            <section className="container py-8 md:py-12">
                {welcome?.title && (
                    <p className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">
                        {welcome.title}
                    </p>
                )}
                <div className="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-10 items-center">
                    <div
                        className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3"
                        dangerouslySetInnerHTML={{
                            __html:
                                welcome?.html ??
                                welcome?.content ??
                                welcome?.text ??
                                "",
                        }}
                    />
                    {welcome?.image && (
                        <div className="w-full">
                            <img
                                src={abs(welcome.image)}
                                alt={welcome?.title ?? "welcome"}
                                className="w-full h-auto rounded-xl object-cover"
                                loading="lazy"
                            />
                        </div>
                    )}
                </div>
            </section>

            {/* TREATMENTS SECTION */}
            <section
                className="py-8 md:py-12"
                style={{
                    backgroundImage: ts?.background ? `url(${abs(ts.background)})` : undefined,
                    backgroundRepeat: ts?.background ? "no-repeat" : undefined,
                    backgroundPosition: ts?.background ? "center center" : undefined,
                    backgroundSize: ts?.background ? "cover" : undefined,
                }}
            >
                <div className="container flex flex-col gap-4 md:gap-6">
                    {ts?.title && (
                        <p className="text-ayda-pink-light text-base md:text-lg text-center font-medium">
                            {ts.title}
                        </p>
                    )}
                    {(ts?.subtitle || ts?.intro || ts?.intro2) && (
                        <div className="mx-auto max-w-3xl text-center space-y-2 text-ayda-gray-dark">
                            {ts?.subtitle && <p className="text-lg md:text-xl font-medium">{ts.subtitle}</p>}
                            {ts?.intro && (
                                <p
                                    className="text-sm md:text-base"
                                    dangerouslySetInnerHTML={{ __html: ts.intro }}
                                />
                            )}
                            {ts?.intro2 && (
                                <p
                                    className="text-sm md:text-base"
                                    dangerouslySetInnerHTML={{ __html: ts.intro2 }}
                                />
                            )}
                        </div>
                    )}

                    {/* Tedaviler listesi */}
                    {Array.isArray(ts?.treatments) && ts.treatments.length > 0 && (
                        <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 md:gap-4 mt-4">
                            {ts.treatments.map((t) => (
                                <a
                                    key={t.slug}
                                    href={`/${lang}/tedaviler/${t.slug}`}
                                    className="border rounded-xl px-3 py-2 md:px-4 md:py-3 text-center text-sm md:text-base hover:bg-gray-50 transition-colors"
                                >
                                    {t.label}
                                </a>
                            ))}
                        </div>
                    )}

                    {/* CTA */}
                    {ts?.ctaText && ts?.ctaLink && (
                        <div className="mt-4 text-center">
                            <a
                                href={ts.ctaLink}
                                className="inline-block rounded-full border px-4 py-2 md:px-6 md:py-3 text-sm md:text-base font-medium hover:bg-gray-50"
                            >
                                {ts.ctaText}
                            </a>
                        </div>
                    )}
                </div>
            </section>

            {/* SHOWCASE */}
            {showcaseItems.length > 0 && (
                <section className="container py-8 md:py-12">
                    <div className="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 md:gap-4">
                        {showcaseItems.map((s: any, idx: number) => (
                            <div key={idx} className="rounded-2xl overflow-hidden bg-gray-100">
                                <img
                                    src={abs(s.image)}
                                    alt={`showcase-${idx + 1}`}
                                    className="w-full h-full object-cover"
                                    style={{ aspectRatio: "1/1" }}
                                    loading="lazy"
                                />
                            </div>
                        ))}
                    </div>
                </section>
            )}
        </main>
    );
}
