// src/app/[locale]/iletisim/page.tsx
import { Locale, getContact } from "@/lib/cms";
import ContactForm from "@/components/ui/ContactForm";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getContact(params.locale);

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

                <div className="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                    {/* Sol: iletişim bilgileri + harita */}
                    <section className="flex flex-col gap-4">
                        <h2 className="text-sm md:text-base text-ayda-pink-light capitalize font-medium">
                            {data.address.title}
                        </h2>
                        <p className="text-ayda-gray-dark">{data.address.text}</p>

                        <ul className="text-sm md:text-base text-ayda-gray-dark">
                            {data.contact.phone && <li><strong>Tel:</strong> {data.contact.phone}</li>}
                            {data.contact.email && <li><strong>Email:</strong> {data.contact.email}</li>}
                            {data.workhours && <li className="uppercase tracking-[5px]">{data.workhours}</li>}
                        </ul>

                        {data.socials?.length > 0 && (
                            <div className="flex gap-3 items-center">
                                {data.socials.map((s, i) => (
                                    <a key={i} href={s.url} target="_blank" rel="noreferrer" className="inline-flex">
                                        {s.icon ? <img src={s.icon} alt={s.platform} className="w-6 h-6" /> : <span>{s.platform}</span>}
                                    </a>
                                ))}
                            </div>
                        )}

                        {data.address.mapEmbed ? (
                            <div className="mt-3 border rounded overflow-hidden"
                                 dangerouslySetInnerHTML={{ __html: data.address.mapEmbed }} />
                        ) : data.address.mapUrl ? (
                            <a href={data.address.mapUrl} className="underline text-ayda-pink-light" target="_blank">Haritada aç</a>
                        ) : null}
                    </section>

                    {/* Sağ: form */}
                    <section className="flex flex-col gap-3">
                        <h2 className="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center md:text-left">
                            {params.locale === 'tr' ? 'Bize Yazın' : 'Write to Us'}
                        </h2>
                        <ContactForm locale={params.locale} fields={data.form.fields} />
                    </section>
                </div>
            </div>
        </main>
    );
}
