// src/app/[locale]/hakkimizda/neden-biz/page.tsx
import { Locale, getWhyUsPage } from "@/lib/cms";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getWhyUsPage(params.locale);

    return (
        <main className="flex-1 flex flex-col">
            {data.heroImage && (
                <div
                    className="bg-gray-300 w-full aspect-[16/7] md:aspect-[16/5] max-h-[400px]"
                    style={{
                        backgroundImage: `url(${data.heroImage})`,
                        backgroundRepeat: "no-repeat",
                        backgroundPosition: "center center",
                        backgroundSize: "cover",
                    }}
                />
            )}

            <div className="container flex flex-col gap-5 py-5 md:py-10">
                <p className="text-ayda-blue text-lg md:text-xl text-center uppercase font-medium">
                    {data.title}
                </p>

                {data.intro && (
                    <div
                        className="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1"
                        dangerouslySetInnerHTML={{ __html: data.intro }}
                    />
                )}

                {/* Grid UI */}
                <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
                    {data.items.map((i) => (
                        <article key={i.slug} className="rounded-2xl overflow-hidden border">
                            <div
                                className="w-full bg-gray-100"
                                style={{
                                    aspectRatio: i.aspect || "16/9",
                                    maxHeight: i.maxHeight ? `${i.maxHeight}px` : undefined,
                                }}
                            >
                                <img
                                    src={i.image.startsWith("http") ? i.image : `${process.env.NEXT_PUBLIC_API?.replace(/\/+$/,'')}${i.image.startsWith('/')?i.image:`/${i.image}`}`}
                                    alt={i.title ?? "why-us"}
                                    className="w-full h-full object-cover"
                                    loading="lazy"
                                />
                            </div>
                            {(i.title || i.text) && (
                                <div className="p-3 md:p-4">
                                    {i.title && (
                                        <h3 className="text-sm md:text-base text-ayda-pink-light font-medium mb-1">
                                            {i.title}
                                        </h3>
                                    )}
                                    {i.text && (
                                        <div
                                            className="prose prose-sm max-w-none text-ayda-gray-dark"
                                            dangerouslySetInnerHTML={{ __html: i.text }}
                                        />
                                    )}
                                </div>
                            )}
                        </article>
                    ))}
                </div>
            </div>
        </main>
    );
}
