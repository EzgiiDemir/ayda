// src/components/site/Footer.tsx
import type { FooterDTO } from "@/lib/cms";

const API_BASE = (process.env.NEXT_PUBLIC_API ?? "").replace(/\/+$/, "");
const abs = (u?: string) =>
    !u ? "" : u.startsWith("http") ? u : `${API_BASE}${u.startsWith("/") ? u : `/${u}`}`;

export default function Footer({ data }: { data: FooterDTO }) {
    return (
        <footer className="mt-10 border-t">
            <div className="container py-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                {/* Address */}
                <div className="space-y-2">
                    <div className="flex items-center gap-2">
                        {data.address_icon ? (
                            // eslint-disable-next-line @next/next/no-img-element
                            <img src={abs(data.address_icon)} alt="" className="h-5 w-5" />
                        ) : null}
                        <h3 className="font-medium">{data.address_title}</h3>
                    </div>
                    <p className="text-sm text-ayda-gray-dark">{data.address_text}</p>
                </div>

                {/* Contact */}
                <div className="space-y-2">
                    <div className="flex items-center gap-2">
                        {data.contact_icon ? (
                            // eslint-disable-next-line @next/next/no-img-element
                            <img src={abs(data.contact_icon)} alt="" className="h-5 w-5" />
                        ) : null}
                        <h3 className="font-medium">{data.contact_title}</h3>
                    </div>
                    <p className="text-sm">
                        <a href={`tel:${data.phone}`} className="hover:underline">
                            {data.phone}
                        </a>
                        {" · "}
                        <a href={`mailto:${data.email}`} className="hover:underline">
                            {data.email}
                        </a>
                    </p>

                    {/* Socials */}
                    {Array.isArray(data.socials) && data.socials.length > 0 && (
                        <div className="flex gap-3 pt-1">
                            {data.socials.map((s) => (
                                <a
                                    key={s.platform}
                                    href={s.url}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="inline-flex items-center gap-1 hover:opacity-80"
                                    aria-label={s.platform}
                                    title={s.platform}
                                >
                                    {s.icon ? (
                                        // eslint-disable-next-line @next/next/no-img-element
                                        <img src={abs(s.icon)} alt="" className="h-5 w-5" />
                                    ) : null}
                                </a>
                            ))}
                        </div>
                    )}
                </div>

                {/* Quick links */}
                <div>
                    <h3 className="font-medium">Hızlı Bağlantılar</h3>
                    <ul className="mt-2 space-y-1 text-sm">
                        {data.quicklinks?.map((q) => (
                            <li key={q.href}>
                                <a href={q.href} className="hover:underline">
                                    {q.label}
                                </a>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>

            <div className="border-t">
                <div className="container py-4 text-xs text-center text-ayda-gray-dark">
                    {data.copyright}
                </div>
            </div>
        </footer>
    );
}
