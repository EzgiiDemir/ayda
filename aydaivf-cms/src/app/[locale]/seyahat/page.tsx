// src/app/[locale]/seyahat/page.tsx
import { Locale, getTravel } from "@/lib/cms";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getTravel(params.locale);

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

                <div className="flex flex-col gap-10">
                    {data.categories.map((cat) => (
                        <section key={cat.name} className="flex flex-col gap-4">
                            <h2 className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
                                {cat.name}
                            </h2>

                            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {cat.items.map((it, i) => (
                                    <article key={i} className="border rounded-md p-4 hover:shadow-sm transition">
                                        <div className="flex items-start gap-3">
                                            {it.icon && (
                                                <img src={it.icon} alt="" className="w-8 h-8 object-contain mt-1" />
                                            )}
                                            <h3 className="font-semibold text-ayda-gray-dark">{it.title}</h3>
                                        </div>
                                        <div
                                            className="prose max-w-none mt-2 text-sm md:text-base text-ayda-gray-dark"
                                            dangerouslySetInnerHTML={{ __html: it.html }}
                                        />
                                        {it.link && (
                                            <a href={it.link} className="text-ayda-pink-light text-sm underline mt-2 inline-block">
                                                Daha fazla bilgi
                                            </a>
                                        )}
                                    </article>
                                ))}
                            </div>
                        </section>
                    ))}
                </div>
            </div>
        </main>
    );
}
