import { getFooter } from "@/lib/cms";

export default async function Footer({ locale }: { locale: "tr" | "en" }) {
    const data = await getFooter(locale);

    return (
        <footer className="mt-auto bg-ayda-blue pt-10 flex flex-col gap-10">
            <div className="container grid grid-cols-1 sm:grid-cols-2 breakpoint-900:grid-cols-3 gap-5">

                {/* Adres */}
                <div className="bg-white rounded-md p-5 flex flex-col justify-center items-center w-full">
                    <div className="relative w-8 h-8 md:w-10 md:h-10 rounded-md bg-ayda-pink-dark p-2 flex justify-center items-center my-2 md:my-4">
                        <img src={data?.address_icon} alt="address-icon" className="w-[70%] h-[70%]" />
                    </div>
                    <p className="text-ayda-dark text-lg font-medium">{data?.address_title}</p>
                    <p className="text-base text-ayda-gray-dark text-center">{data?.address_text}</p>
                </div>

                {/* İletişim */}
                <div className="bg-white rounded-md p-5 flex flex-col justify-center items-center w-full">
                    <div className="relative w-8 h-8 md:w-10 md:h-10 rounded-md bg-ayda-pink-dark p-2 flex justify-center items-center my-2 md:my-4">
                        <img src={data?.contact_icon} alt="contact-icon" className="w-[70%] h-[70%]" />
                    </div>
                    <p className="text-ayda-dark text-lg font-medium">{data?.contact_title}</p>
                    <p className="text-base text-ayda-gray-dark">
                        <a href={`tel:${data?.phone}`} className="hover:text-ayda-pink-dark">{data?.phone}</a>
                    </p>
                    <p className="text-base text-ayda-gray-dark">
                        <a href={`mailto:${data?.email}`} className="hover:text-ayda-pink-dark">{data?.email}</a>
                    </p>
                </div>

                {/* Hızlı Erişim */}
                <div className="bg-white rounded-md p-5 flex flex-col justify-center items-center w-full">
                    <p className="text-ayda-dark text-lg font-medium">Hızlı Erişim</p>
                    <div className="flex flex-col gap-2 items-center">
                        {data?.quicklinks?.map((l, i) => (
                            <a key={i} href={l.href} className="text-base text-ayda-pink-light hover:text-ayda-pink-dark">
                                {l.label}
                            </a>
                        ))}
                    </div>
                </div>
            </div>

            {/* Copyright */}
            <div className="flex justify-center py-4 bg-[#706F6F4F] text-ayda-gray-light">
                <p className="text-sm">{data?.copyright}</p>
            </div>
        </footer>
    );
}
