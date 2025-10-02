// src/app/[locale]/sss/page.tsx
import { Locale, getFaq } from "@/lib/cms";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getFaq(params.locale);
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

                <div className="flex flex-col gap-8">
                    {data.categories.map((cat) => (
                        <section key={cat.name} className="flex flex-col gap-3">
                            <h2 className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                {cat.name}
                            </h2>
                            <div className="flex flex-col divide-y border rounded-md">
                                {cat.items.map((it, i) => (
                                    <details key={i} className="group p-3">
                                        <summary className="cursor-pointer list-none font-medium">
                                            {it.question}
                                        </summary>
                                        <div
                                            className="prose max-w-none pt-2 text-sm md:text-base text-ayda-gray-dark"
                                            dangerouslySetInnerHTML={{ __html: it.answer }}
                                        />
                                    </details>
                                ))}
                            </div>
                        </section>
                    ))}
                </div>
            </div>
        </main>
    );
}
